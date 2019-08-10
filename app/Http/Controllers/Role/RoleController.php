<?php

namespace App\Http\Controllers\Role;

use App\Models\Participant;
use DateTime;
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

        if ($roles->is_technician) {
            $roleData = $user->technician()->get()[0];
        } elseif ($roles->is_voluntary) {
            $roleData = $user->voluntarie()->get()[0];
        } elseif ($roles->is_participant) {
            $roleData = $user->participant()->get()[0];
        } else {
            $roleData = null;
        }

        return view('role.index')
            ->with("user", $user)
            ->with("roles", $roles)
            ->with("roleData", $roleData);
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
        $acesso = Auth::user()->actor()->get()[0];

        if ($acesso->is_participant) {
            return $this->updateParticipants($request);
        }

        if ($acesso->is_technician) {
            return $this->updateTechnicians($request);
        }

        if ($acesso->is_voluntary) {
            return $this->updateVoluntaries($request);
        }

        $request->session()->flash('update_unsuccessful', 'Sem função');
        // Fracasso! Redireciona de volta.
        return redirect()->back();
    }

    private function updateParticipants(Request $request)
    {

        $rules = [
            'name' => 'required|string|min:1|max:100',
            'course' => 'required|string|min:1|max:100',
            'shirt_size' => 'required|string|min:1|max:3',
            'rga' => 'required',
            'birthday' => 'required|date_format:"d-m-Y"'
        ];
        $this->validate($request, $rules);

        $user = Auth::user();
        if ($user->participant()->get()->isEmpty()) {
            $participante = new Participant($request->all());

            if ($user->participant()->save($participante)) {
                return $this->index();
            }
        }

        if ($user->update()) {
            return $this->index();
        }
        $request->session()->flash('update_unsuccessful', 'Não foi possível atualizar, tente novamente mais tarde');
        // Fracasso! Redireciona de volta.
        return redirect()->back();
    }

    private function updateVoluntaries(Request $request)
    {
        $request->session()->flash('update_unsuccessful', 'Não é possível alterar de função.');
        // Fracasso! Redireciona de volta.
        return redirect()->back();
    }

    private function updateTechnicians(Request $request)
    {
        $request->session()->flash('update_unsuccessful', 'Não é possível alterar de função.');
        // Fracasso! Redireciona de volta.
        return redirect()->back();
    }

    public function changeRole(Request $request)
    {
        $request->validate([
            'role' => 'required',
        ]);

        $acesso = Auth::user()->actor()->get()[0];

        $times = Auth::user()->teams()->get();

        if ($times->isNotEmpty()) {
            $request->session()->flash('update_unsuccessful', 'Não é possível trocar de função estando em um time');
            // Fracasso! Redireciona de volta.
            return redirect()->back();
        }

        if ($acesso->status == true) {
            $request->session()->flash('update_unsuccessful', 'Não é possível alterar de função.');
            // Fracasso! Redireciona de volta.
            return redirect()->back();
        }

        if ($request->get("is_administrator")) {
            $request->session()->flash('update_unsuccessful', 'Devido a uma ação suspeita, seu Ip será salvo para auditoria.');
            // Fracasso! Redireciona de volta.
            return redirect()->back();
        }

        $acesso->is_technician = 0;
        $acesso->is_voluntary = 0;
        $acesso->is_participant = 0;

        switch ($request->get("role")) {
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

        if ($acesso->update()) {
            return $this->index();
        }
        $request->session()->flash('update_unsuccessful', 'Não foi possível atualizar, tente novamente mais tarde');
        // Fracasso! Redireciona de volta.
        return redirect()->back();
    }
}
