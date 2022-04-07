<?php

namespace Modules\Chat\Transformers;

use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ChatLineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        if (($this->user->role->slug == 'general_user')  == (Auth::user()->role->slug == 'general_user'))
            $type = 'me';
        else
            $type = 'not_me';

        return [
            'type' => $type,
            'message' => $this->message,
            'time' => $this->created_at->format('H:i'),
            'send_status' => $this->send_status,
        ];
    }
}
