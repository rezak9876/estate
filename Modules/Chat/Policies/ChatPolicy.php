<?php

namespace Modules\Chat\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Chat\Entities\Chat;

class ChatPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any chats.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return ($user->permissions()->where('slug', 'like', 'chats.%')->count() > 0);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Chat $chat)
    {
        return ($user->role->slug == 'general_user' || $user->permissions()->where('slug', 'chats.show')->exists());
    }


    public function send_chat(User $user)
    {
        return ($user->role->slug == 'general_user' || $user->permissions()->where('slug', 'chats.send_chat')->exists());
    }
}
