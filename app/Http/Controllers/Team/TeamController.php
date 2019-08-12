<?php

namespace App\Http\Controllers\Team;

use App\Models\Marathon;
use App\Models\Profile;
use App\Models\Team;
use App\User;
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
            // Faz uma busca pelos times do usuário.git a
            $teams = Auth::user()->teams()->where('name', request('q'))->paginate();
        } else {
            // Obtém somente os times do usuário.
            $teams = Auth::user()->teams()->paginate();
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
        $user = Auth::user();

        // Verifica se o usuario pode vizualizar
        $aux = $user->teams()->where([
            ['user_id', '=', Auth::id()],
            ['id', '=', $teamIdentification]
        ])->get()->count();

        if ($aux == 0) {
            abort(403);
        }

        $team = Team::with('participants')
            ->findOrFail($teamIdentification);
        // Pesquisa por maratonas com período de inscrição aberto ...
        $marathons = Marathon::where('starts', '<', now())
            ->where('ends', '>', now())
            ->get();

        $participantes = collect();
        foreach ($team->participants as $data) {
            $perfil = Profile::where('user_id', '=', $data->user_id)->get()->first();
            $perfil["email"] = User::findOrFail($data->user_id)->email;
            $participantes->add($perfil);
        }

        return view('team.show')
            ->with('team', $team)
            ->with('marathons', $marathons)
            ->with('participants', $participantes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $teamIdentification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $teamIdentification)
    {
        $rules = [
            'name' => 'required|string|min:1|max:100',
            'description' => 'required|string'
        ];
        $this->validate($request, $rules);

        $team = Team::findOrFail($teamIdentification);

        if ($team->update($request->except(['user_id', 'marathon_id', 'validated']))) {
            $request->session()->flash('updated_successful', 'O recurso foi atualizado com sucesso');
            // Sucesso! Redireciona para a página de visualização do álbum.
            return redirect()->route('team.show', $team->id);
        }
        $request->session()->flash('updated_unsuccessful', 'Não foi possível atualizar o recurso');
        // Fracasso! Redireciona de volta.
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $teamIdentification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $teamIdentification)
    {
        $team = Team::findOrFail($teamIdentification);

        // Se o time já está inscrito na maratona não pode ser removido ...
        if ($team->marathon) {
            return redirect()->back()->withErrors([
                'Você não pode remover este time, você precisa desfazer a matrícula '
            ]);
        }

        // Se o time já foi validado, não pode ser removido ...
        if ($team->validated) {
            return redirect()->back()->withErrors([
                'Seu time já foi validado, e não pode ser removido'
            ]);
        }

        if ($team->delete()) {
            $request->session()->flash('created_successful', 'O recurso foi deletado');
            // Sucesso! Redireciona para a página de visualização do álbum.
            return redirect()->route('team.index');
        }

        $request->session()->flash('created_unsuccessful', 'Falha ao deletar o time.');
        // Sucesso! Redireciona para a página de visualização do álbum.
        return redirect()->back();
    }
}
