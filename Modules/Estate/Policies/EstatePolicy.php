<?php

namespace Modules\Estate\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Estate\Entities\Estate;

class EstatePolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any estates.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return ($user->permissions()->where('slug', 'like', 'estate.%')->count() > 0);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        return ($user->permissions()->where('slug', 'estate.update')->exists());
    }



    /**
     * Determine whether the user can create estates.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user->permissions()->where('slug', 'estate.create')->exists());
    }

    /**
     * Determine whether the user can update the estate.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function update(User $user)
    {
        return ($user->permissions()->where('slug', 'estate.update')->exists());
    }


    /**
     * Determine whether the user can delete the estate.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function delete(User $user)
    {
        return ($user->permissions()->where('slug', 'estate.delete')->exists());
    }
}
