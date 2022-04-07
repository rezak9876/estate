<?php

namespace Modules\Chat\Transformers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ChatLineCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $responce = [
            'data' => ChatLineResource::collection($this->collection),
            'meta' => [
                'count' => $this->count($this->collection)
            ]
        ];
        if ($this->chat_id)
            $responce['chat_id'] = $this->chat_id;

        return $responce;
    }

    protected $chat_id;

    public function chat_id($value)
    {
        $this->chat_id = $value;
        return $this;
    }
}
