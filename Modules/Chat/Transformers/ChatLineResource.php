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
            //role of sender and auth user is same
            $owntype = 'me';
        else
            //role of sender and auth user is not same
            $owntype = 'not_me';

        // declare response
        $responce = [
            'owntype' => $owntype,
            'content_type' => $this->content_type,
            'time' => $this->created_at->format('H:i'),
            'send_status' => $this->send_status,
        ];

        switch ($this->content_type) {
            case 'file':
                // declare file of response for file chatline
                $responce['file'] = [
                    'title' => $this->file->title,
                    'link' => $this->full_link(),
                    'size' => $this->file->size,
                ];
                break;
            default:
                // declare content of response for text chatline
                $responce['content'] = $this->content;
        }

        //return response
        return $responce;
    }
}
