<?php

namespace App\Policies\User;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can index the model.
     *
     * @param \App\Models\User $user O usuário antenticado
     * @return mixed
     */
    public function index(User $user)
    {
        // Atenção, somente o usuário administrador pode listar os usuários ...
        return $user->actor && ($user->actor->is_administrator || $user->actor->is_technician);
    }
}
