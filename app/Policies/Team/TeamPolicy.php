<?php

namespace App\Policies\Team;

use App\User;
use App\Models\Team;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamPolicy
{
    use HandlesAuthorization;

    /**
    * Determine whether the user can create a team.
    *
    * @param \App\User $user O usuário autenticado
    * @return mixed
    */
    public function create(User $user)
    {
      return $user->actor->is_administrator;
    }
    
    /**
     * Determine whether the user can update a team.
     *
     * @param \App\User $user O usuário autenticado
     * @param \App\Models\Team $team O time para verificação
     * @return mixed
     */
    public function update(User $user, Team $team)
    {
      return $user->id === $team->user_id;
    }
 
     /**
      * Determine whether the user can destroy a team.
      *
      * @param \App\User $user O usuário autenticado
      * @param \App\Models\Team $team O time para verificação
      * @return mixed
      */
    public function destroy(User $user, Team $team)
    {
      return $user->id === $team->user_id;
    }
 
}
