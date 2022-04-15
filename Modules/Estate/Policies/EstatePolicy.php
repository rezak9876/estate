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
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Estate $estate)
    {
        return $this->update($user, $estate) || $this->delete($user, $estate);
    }



    /**
     * Determine whether the user can create estates.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the estates.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function update(User $user, Estate $estate)
    {
        if ($estate->user_id != $user->id)
            if ($user->role->slug == 'general_user' || !$user->permissions()->where('slug', 'estates.edit')->exists())
                return false;
        return true;
    }


    /**
     * Determine whether the user can delete the estates.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function delete(User $user, Estate $estate)
    {
        if ($estate->user_id != $user->id)
            if ($user->role->slug == 'general_user' || !$user->permissions()->where('slug', 'estates.delete')->exists())
                return false;
        return true;
    }

    public function excel(User $user)
    {
        return ($user->permissions()->where('slug', 'estates.excel')->exists());
    }

    public function verification(User $user)
    {
        return ($user->permissions()->where('slug', 'estates.verification')->exists());
    }
}
