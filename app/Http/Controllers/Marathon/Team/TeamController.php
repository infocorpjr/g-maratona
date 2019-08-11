<?php

namespace App\Http\Controllers\Marathon\Team;

use App\Models\Marathon;
use App\Models\Participant;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $marathonIdentification
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $marathonIdentification)
    {
        $this->validate($request, [
            'team_id' => 'required|integer'
        ]);
        // Obtém informações sobre a maratona.
        $marathon = Marathon::findOrFail($marathonIdentification);
        // Obtém informações sobre o time
        $team = Team::findOrFail($request->input('team_id'));

        $participantsTeam = $team->participants()->get();

        // Verificacao do lider
        $teams = $team->where([
            ["marathon_id", "=", $marathonIdentification],
            ["user_id", "=", $team->user_id]
        ])->count();

        if ($teams != 0){
            $request->session()
                ->flash('created_unsuccessful', 'Não foi possível realizar a matrícula. Você já está cadastrado em uma equipe 😢');
            return redirect()->back();
        }

        // VALIDACAO se algum integrante da equipe está em algum time
        foreach ($participantsTeam as $participant) {
            // Verificacao dos participantes
            $aux = DB::table('teams')
                ->join('participants', 'participants.team_id', '=', 'teams.id')
                ->where([
                    ["teams.marathon_id", "=", $marathonIdentification],
                    ["participants.user_id", "=", $participant->user_id]
                ])
                ->count();
            if ($aux != 0) {
                $request->session()
                    ->flash('created_unsuccessful', 'Não foi possível realizar a matrícula. ' . $participant->name . ' já está inscrito nessa maratona em outra equipe 😢');
                return redirect()->back();
            }
        }

        // Se o time já tem uma maratona, redireciona de volta ...
        if ($team->marathon_id) {
            return redirect()->back();
        }

        if ($marathon->teams()->save($team)) {
            $request->session()->flash('created_successful', 'A matrícula foi realizada com sucesso');
            return redirect()->back();
        }
        $request->session()->flash('created_unsuccessful', 'Não foi possível realizar a matrícula');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $marathonIdentification
     * @param int $teamIdentification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $marathonIdentification, $teamIdentification)
    {
        // Obtém informações sobre a maratona.
        $marathon = Marathon::findOrFail($marathonIdentification);
        // Obtém informações sobre o time
        $team = Team::findOrFail($teamIdentification);

        // Se o time já foi validado, não pode ser desfeita a matrícula ...
        if ($team->validated) {
            return redirect()->back()->withErrors([
                'Seu time já foi validado, e não pode ser removido'
            ]);
        }

        // Remove o id da maratona da coluna de relacionamento
        if ($team->update(["marathon_id" => null])) {
            $request->session()->flash('created_successful', 'A matrícula foi realizada com sucesso');
            return redirect()->back();
        }
        $request->session()->flash('created_unsuccessful', 'Não foi possível realizar a matrícula');
        return redirect()->back();
    }
}
