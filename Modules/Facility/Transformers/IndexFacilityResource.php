<?php

namespace Modules\Facility\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class IndexFacilityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => $this->gettypeName(),
            'title' => $this->title
        ];
    }
}
