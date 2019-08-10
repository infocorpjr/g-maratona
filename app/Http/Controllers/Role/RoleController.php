<?php

namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $roles = $user->actor()->get()[0];
        return view('role.index')
            ->with("user", $user)
            ->with("roles", $roles);
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

    public function changeRole(Request $request)
    {
        $request->validate([
            'role' => 'required',
        ]);

        $acesso = Auth::user()->actor()->get()[0];

        $times = Auth::user()->teams()->get();

        if ($times->isNotEmpty()){
            $request->session()->flash('update_unsuccessful', 'Não é possível trocar de função estando em um time');
            // Fracasso! Redireciona de volta.
            return redirect()->back();
        }

        if ($acesso->status == true){
            $request->session()->flash('update_unsuccessful', 'Não é possível alterar de função.');
            // Fracasso! Redireciona de volta.
            return redirect()->back();
        }

        if ($request->get("is_administrator")){
            $request->session()->flash('update_unsuccessful', 'Devido a uma ação suspeita, seu Ip será salvo para auditoria.');
            // Fracasso! Redireciona de volta.
            return redirect()->back();
        }

        $acesso->is_technician = 0;
        $acesso->is_voluntary = 0;
        $acesso->is_participant = 0;

        switch ($request->get("role")){
            case "is_technician":
                $acesso->is_technician = 1;
                break;
            case "is_voluntary":
                $acesso->is_voluntary = 1;
                break;
            case "is_participant":
                $acesso->is_participant = 1;
                break;
        }

        $acesso->update();

        return $this->index();
    }
}
