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
        return ($user->permissions()->where('slug', 'like', 'role.%')->count() > 0);
    }

     /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        return ($user->permissions()->where('slug', 'like', 'role.%')->count() > 0);
    }



    /**
     * Determine whether the user can create roles.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user->permissions()->where('slug', 'role.create')->exists());
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function update(User $user)
    {
        return ($user->permissions()->where('slug', 'role.update')->exists());
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function delete(User $user)
    {
        return ($user->permissions()->where('slug', 'role.delete')->exists());
    }
}
