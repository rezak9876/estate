<?php

namespace Modules\Term\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TermPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any terms.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return ($user->permissions()->where('slug', 'like', 'terms.%')->count() > 0);
    }

     /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        return ($user->permissions()->where('slug', 'like', 'terms.%')->count() > 0);
    }



    /**
     * Determine whether the user can create terms.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user->permissions()->where('slug', 'terms.create')->exists());
    }

    /**
     * Determine whether the user can update the terms.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function update(User $user)
    {
        return ($user->permissions()->where('slug', 'terms.edit')->exists());
    }

    /**
     * Determine whether the user can delete the terms.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function delete(User $user)
    {
        return ($user->permissions()->where('slug', 'terms.delete')->exists());
    }
}
