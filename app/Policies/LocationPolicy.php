<?php
declare(strict_types=1);

namespace App\Policies;

use App\Location;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

class LocationPolicy
{
    use HandlesAuthorization;

    /**
     * Perform extra logic before policy check.
     *
     * @param  \App\User  $user
     * @param  string  $ability
     * @return bool|null
     */
    public function before(User $user, string $ability)
    {
        Log::info("Checking authorization to '{$ability}' for user '{$user}'");
        // Admin can do everything.
        if ($user->isAdmin()) {
            return true;
        }
        return null;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Location  $location
     * @return bool
     */
    public function view(?User $user, Location $location)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Location  $location
     * @return bool
     */
    public function update(User $user, Location $location)
    {
        return !is_null($location->user) && $user->id === $location->user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Location  $location
     * @return bool
     */
    public function delete(User $user, Location $location)
    {
        return !is_null($location->user) && $user->id === $location->user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Location  $location
     * @return bool
     */
    public function restore(User $user, Location $location)
    {
        return !is_null($location->user) && $user->id === $location->user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Location  $location
     * @return bool
     */
    public function forceDelete(User $user, Location $location)
    {
        return !is_null($location->user) && $user->id === $location->user->id;
    }
}
