<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User $user
     * @param  \App\User $model
     * @return bool
     */
    public function view(?User $user, User $model)
    {
        return true;
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param  \App\User $user
     * @return bool
     */
    public function update(User $user)
    {
        return $user->isCurrent();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User $user
     * @param  \App\User $victim
     * @return bool
     */
    public function delete(User $user, User $victim)
    {
        return $user->isAdmin();
    }
}
