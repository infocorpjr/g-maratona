<?php

namespace App\Http\Controllers\Marathon\Team;

use App\Models\Marathon;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
     * @param int $marathonIdentification
     * @param int $teamIdentification
     * @return \Illuminate\Http\Response
     */
    public function destroy($marathonIdentification, $teamIdentification)
    {
        // Obtém informações sobre a maratona.
        $marathon = Marathon::findOrFail($marathonIdentification);
        // Obtém informações sobre o time
        $team = Team::findOrFail($teamIdentification);

        // Se o time já foi validado, não pode ser desfeita a matrícula ...
        if (!$team->validated) {
            return redirect()->back()->withErrors([
                'apoksdapoksdposak'
            ]);
        }

        dd($marathon, $team);
    }
}
