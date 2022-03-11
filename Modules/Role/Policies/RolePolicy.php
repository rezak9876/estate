<?php

namespace Modules\Role\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any roles.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return ($user->permissions()->where('slug', 'like', 'roles.%')->count() > 0);
    }

     /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        return ($user->permissions()->where('slug', 'like', 'roles.%')->count() > 0);
    }



    /**
     * Determine whether the user can create roles.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user->permissions()->where('slug', 'roles.create')->exists());
    }

    /**
     * Determine whether the user can update the roles.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function update(User $user)
    {
        return ($user->permissions()->where('slug', 'roles.edit')->exists());
    }

    /**
     * Determine whether the user can delete the roles.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function delete(User $user)
    {
        return ($user->permissions()->where('slug', 'roles.delete')->exists());
    }
}
