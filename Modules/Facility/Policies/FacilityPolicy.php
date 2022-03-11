<?php

namespace Modules\Facility\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FacilityPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any facilities.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return ($user->permissions()->where('slug', 'like', 'facilities.%')->count() > 0);
    }

     /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        return ($user->permissions()->where('slug', 'like', 'facilities.%')->count() > 0);
    }



    /**
     * Determine whether the user can create facilities.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user->permissions()->where('slug', 'facilities.create')->exists());
    }

    /**
     * Determine whether the user can update the facilities.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function update(User $user)
    {
        return ($user->permissions()->where('slug', 'facilities.edit')->exists());
    }

    /**
     * Determine whether the user can delete the facilities.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function delete(User $user)
    {
        return ($user->permissions()->where('slug', 'facilities.delete')->exists());
    }
}
