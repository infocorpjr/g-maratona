<?php

namespace App\Http\Controllers\Profile;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Auth::user()->profile()->get()->first();

        return view("profile.index")
            ->with("profile", $profile);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("profile.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Salva foto de url
        $avatar = $request->file('image');
        if ($avatar) {
            $pathCapa = $avatar->store('images/avatar/' . time(), ['disk' => 'public']);
            // Adiciona campo no vetor referente a extension
            $request->merge([
                'avatar_url' => $pathCapa,
            ]);
        }

        $profile = new Profile($request->all());

        if ($profile->save()) {
            $request->session()->flash('created_successful', 'Perfil salvo com sucesso');
            return redirect()->route('profile.index');
        }

        // Deleta arquivos salvos caso aconteça um erro
        Storage::disk('public')->delete($avatar);
        $request->session()->flash('created_unsuccessful', 'Houve um erro ao criar ao criar o Perfil');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        return view('profile.edit')->with('profile', $profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'cpf' => 'required|string|min:14',
        ];
        $this->validate($request, $rules);

        $profile = Profile::findOrFail($id);

        // Atualiza foto do avatar
        $avatarURL = null;
        if ($request->file('avatarImage')) {
            $avatar = $request->file('avatarImage');
            $avatarURL = $avatar->store('images/avatar/' . time(), ['disk' => 'public']);

            // Adiciona campo no vetor referente a extension
            $request->merge([
                'avatar_url' => $avatarURL,
            ]);
        }

        $oldimage = $profile->avatar_url;

        if ($profile->update($request->all())) {
            if ($request->file('avatarImage')) {
                Storage::disk('public')->delete($oldimage);
            }
            $user = Auth::user();
            $user->create_profile = 1;
            $user->update();

            $request->session()->flash('successful', 'Perfil atualizado com sucesso');
            return redirect()->route('profile.index');
        }

        if ($request->file('avatarImage')) {
            Storage::disk('public')->delete($avatarURL);
        }

        $request->session()->flash('unsuccessful', 'Erro ao editar o perfil');
        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);

        if ($profile->delete()) {
            Storage::disk('public')->delete($profile->avatar_url);

            $request->session()->flash('successful', 'Perfil excluido com sucesso');
            // Sucesso! Redireciona de volta.
            return redirect()->route('back.event.index');
        }

        $request->session()->flash('unsuccessful', 'Não foi possivel deletar o recurso.');
        // Sucesso! Redireciona de volta.
        return redirect()->back();
    }
}
