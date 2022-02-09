<?php

namespace Modules\Role\Transformers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RoleCollection extends ResourceCollection
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
            'data' => RoleResource::collection($this->collection),
            'meta' => [
                'count' => $this->count($this->collection)
            ]
        ];
    }
}
