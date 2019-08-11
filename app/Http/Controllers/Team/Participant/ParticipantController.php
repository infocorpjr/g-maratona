<?php

namespace App\Http\Controllers\Team\Participant;

use App\User;
use App\Models\Team;
use App\Models\Participant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        // Recupera a query de busca ...
        $q = request('q', '');

        // Busca todos os usuários que são participantes

        $participants = User::with('actor')->where('name', 'like', '%' . $q . '%')
            ->whereHas('actor', function ($query) use ($q) {
                $query->where('is_participant', true);
            })->get();

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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
