<?php

namespace Modules\Chat\Transformers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ChatLineCollection extends ResourceCollection
{
    // public $preserveKeys = true;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => ChatLineResource::collection($this->collection),
            'meta' => [
                'count' => $this->count($this->collection)
            ]
        ];
    }
}
