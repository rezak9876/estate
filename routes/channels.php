<?php

use Illuminate\Support\Facades\Broadcast;
use Modules\Chat\Entities\Chat;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/
Broadcast::channel('my-channel.{id}', function ($user, $id) {
    //dd(Chat::find($id)->chat_lines->count());
    if($user->role->slug != 'general_user'){
        return true;
    }
    return (int) $user->id ==  Chat::find($id)->users->first()->id;
});
