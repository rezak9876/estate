<?php

namespace Modules\Role\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
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
            'slug' => $this->slug,
            'title' => $this->title,
            'permissions' => $this->permissions()->pluck('id')->map(function ($item, $key) {
                return strval($item);
            }),
        ];
    }
}
