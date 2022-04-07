<?php

namespace Modules\Chat\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {

        $user_name = $this->users()->whereHas('role', function ($q) {
            $q->where('slug', 'general_user');
        })->first()->name;

        return [
            'id' => $this->id,
            'user_name' => $user_name,
        ];
    }
}
