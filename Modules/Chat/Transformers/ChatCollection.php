<?php

namespace Modules\Chat\Transformers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ChatCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => ChatResource::collection($this->collection),
            'meta' => [
                'count' => $this->count($this->collection)
            ]
        ];
    }
}
