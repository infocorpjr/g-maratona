<?php

namespace App\Http\Controllers\Team;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('q', false)) {
            // Faz uma busca pelos times do usuário.
            $teams = Auth::user()->teams()->where('name', request('q'))->get();
        } else {
            // Obtém somente os times do usuário.
            $teams = Auth::user()->teams()->get();
        }

        return view('team.index')->with('teams', $teams);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:1|max:100',
            'description' => 'required|string'
        ];
        $this->validate($request, $rules);
        $team = new Team($request->all());

        // Adiciona o usuário da requisição.
        $team->user_id = $request->user()->id;
        // Somente o administrador pode validar o time.
        $team->validated = false;

        if ($team->save()) {
            $request->session()->flash('created_successful', 'O recurso foi criado com sucesso');
            // Sucesso! Redireciona para a página de visualização do álbum.
            return redirect()->route('team.show', $team->id);
        }
        $request->session()->flash('created_unsuccessful', 'Não foi possível salvar o recurso');
        // Fracasso! Redireciona de volta.
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $teamIdentification
     * @return \Illuminate\Http\Response
     */
    public function show($teamIdentification)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
