<?php

namespace App\Http\Controllers\User\Actor;

use App\Models\Actor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @param int $userIdentification
     * @param int $actorIdentification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userIdentification, $actorIdentification)
    {
        // Procura pelo recurso no banco de dados.
        // $user = User::findOrFail($userIdentification);
        // Procura pelo recurso no banco de dados.
        $actor = Actor::findOrFail($actorIdentification);
        // The current user can or can't ...
        // $this->authorize('update', $actor);
        // OPÇÕES PARA ATOR
        $field = ['is_administrator' => false, 'is_technician' => false, 'is_voluntary' => false, 'is_participant' => false];
        if ($request->has('actor')) {
            // Verifica se o valor do campo existe entre as chaves do vetor.
            if (array_key_exists($request->get('actor', ''), $field)) {
                $field[$request->input('actor')] = true;
            } else { // Senão, define o padrão.
                $field['is_participant'] = true;
            }
        }
        // Atualiza o modelo no banco de dados.
        if ($actor->update($field)) {
            $request->session()->flash('updated_successful', "As informações do usuário foram atualizadas");
            // Sucesso! Redireciona de volta.
            return redirect()->back();
        }
        $request->session()->flash('updated_unsuccessful', 'Não foi possível atualizar as informações do usuário');
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
