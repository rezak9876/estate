<?php

namespace Modules\User\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    /**
     * Deuserine whether the user can view any users.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
        return ($user->permissions()->where('slug', 'like', 'users.%')->count() > 0);
    }

     /**
     * Deuserine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        return ($user->permissions()->where('slug', 'like', 'users.%')->count() > 0);
    }



    /**
     * Deuserine whether the user can create users.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user->permissions()->where('slug', 'users.create')->exists());
    }

    /**
     * Deuserine whether the user can update the users.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function update(User $user)
    {
        return ($user->permissions()->where('slug', 'users.edit')->exists());
    }

    /**
     * Deuserine whether the user can delete the users.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function delete(User $user)
    {
        return ($user->permissions()->where('slug', 'users.delete')->exists());
    }
}
