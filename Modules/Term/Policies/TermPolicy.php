<?php

namespace Modules\Term\Policies;

use App\Helpers\FailedPolicy;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TermPolicy
{
    use HandlesAuthorization;
    use FailedPolicy;

    /**
     * Determine whether the user can view any terms.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
        return false;
        if ($user->permissions()->where('slug', 'like', 'term.%')->count() > 0)
            return true;
        else
            $this->failed_policy();
    }

    /**
     * Determine whether the user can create terms.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return false;

        if ($user->permissions()->where('slug', 'term.create')->exists())
            return true;
        else
            $this->failed_policy();

    }

    /**
     * Determine whether the user can update the term.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function update(User $user)
    {
        //
        return false;

        if ($user->permissions()->where('slug', 'term.update')->exists())
            return true;
        else
            $this->failed_policy();
    }

    /**
     * Determine whether the user can delete the term.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function delete(User $user)
    {
        //
        return false;

        if ($user->permissions()->where('slug', 'term.delete')->exists())
            return true;
        else
            $this->failed_policy();
    }
}
