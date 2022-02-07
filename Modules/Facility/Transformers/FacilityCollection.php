<?php

namespace Modules\Facility\Transformers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FacilityCollection extends ResourceCollection
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
            'data' => FacilityResource::collection($this->collection),
            'meta' => [
                'count' => $this->count($this->collection)
            ]
        ];
    }
}
