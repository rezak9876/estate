<?php

namespace Modules\Permission\Transformers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PermissionCollection extends ResourceCollection
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
            'data' => PermissionResource::collection($this->collection),
            'meta' => [
                'count' => $this->count($this->collection)
            ]
        ];
    }
}
