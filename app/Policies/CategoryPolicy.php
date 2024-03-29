<?php

namespace App\Policies;

use App\Category;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User $user
     * @return bool
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User $user
     * @param  \App\Category $category
     * @return bool
     */
    public function view(?User $user, Category $category)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User $user
     * @return bool
     */
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User $user
     * @param  \App\Category $category
     * @return bool
     */
    public function update(User $user, Category $category)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User $user
     * @param  \App\Category $category
     * @return bool
     */
    public function delete(User $user, Category $category)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User $user
     * @param  \App\Category $category
     * @return bool
     */
    public function forceDelete(User $user, Category $category)
    {
        return $user->isAdmin();
    }
}
