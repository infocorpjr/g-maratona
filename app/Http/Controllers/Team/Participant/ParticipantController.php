<?php

namespace App\Http\Controllers\Team\Participant;

use App\User;
use App\Models\Team;
use App\Models\Participant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $teamIdentification
     * @return \Illuminate\Http\Response
     */
    public function index($teamIdentification)
    {
        //
        $team = Team::findOrFail($teamIdentification);

        if (Auth::user()->id !== $team->user_id) {
            abort(403);
        }

        // Recupera a query de busca ...
        $q = request('q', '');

        // Busca todos os usuários que são participantes

        $participants = User::with('actor')
            ->whereNotIn('users.id', [Auth::user()->id])
            ->where([
                ['users.name', 'like', '%' . $q . '%'],
                // Apeans usuarios que já se cadastraram
                ['users.create_profile', '=', true],
                // Membros já na equipe
            ])
            ->whereHas('actor', function ($query) use ($q) {
                $query->where('is_participant', true);
            })
            ->wherenotExists(function ($query) use ($team) {
                $query->select(DB::raw(1))
                    ->from('participants')
                ->whereIn("team_id", [$team->id]);
            })
            ->get();

        return view('team.participant.index')
            ->with('team', $team)
            ->with('participants', $participants);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $teamIdentification
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $teamIdentification)
    {
        $this->validate($request, [
            'user_id' => 'required|integer'
        ]);

        // Procura pelo time no banco
        $team = Team::findOrFail($teamIdentification);
        // Procura pelo usuário no banco
        $user = User::find($request->get('user_id'));

        if (!$user) {
            // TODO, enviar uma mensagem de volta caso o usuário não for encontrado
        }

        //
        $participant = new Participant();
        $participant->user_id = $user->id;
        $participant->team_id = $team->id;

        if ($participant->save()) {
            $request->session()->flash('created_successful', 'O recurso foi criado com sucesso');
            // Sucesso! Redireciona de volta.
            return redirect()->back();
        }
        $request->session()->flash('created_unsuccessful', 'Não foi possível salvar o recurso');
        // Fracasso! Redireciona de volta.
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param $teamI
     * @param $userId
     * @return void
     */
    public function destroy(Request $request, $teamId, $userId)
    {
        $team = Team::findOrFail($teamId);
        if (Auth::user()->id != $team->user_id) {
            abort(403);
        }

        $participante = Participant::where([
            ['team_id', '=', Auth::user()->id],
            ['user_id', '=', $userId]
        ])->get()->first();

        if ($participante->delete()) {
            $request->session()->flash('successful', 'Participante excluido com sucesso');
            // Sucesso! Redireciona de volta.
            return redirect()->back();
        }

        $request->session()->flash('unsuccessful', 'Não foi possível excluir o participantes');
        // Sucesso! Redireciona de volta.
        return redirect()->back();
    }
}
