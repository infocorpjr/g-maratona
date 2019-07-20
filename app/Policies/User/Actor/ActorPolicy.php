<?php

namespace App\Policies\User\Actor;

use App\User;
use App\Models\Actor;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the actor.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Actor $actor
     * @return mixed
     */
    public function update(User $user, Actor $actor)
    {
        // O usuário não pode atualizar seu próprio nível.
        if ($user->id === $actor->id) {
            return false;
        }
        return $user->actor && $user->actor->is_administrator;
    }
}
