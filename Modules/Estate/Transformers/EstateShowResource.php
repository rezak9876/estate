<?php

namespace Modules\Estate\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Estate\Entities\Gallery;

class EstateShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $estate = [
            'id' => $this->id,
            'title' => $this->title,
            'type' => $this->type,
            'use_type_property_id' => $this->use_type_property_id,
            'area' => $this->area,
            'year_of_construction' => $this->year_of_construction,
            'total_price' => $this->total_price,
            'mortgage_price' => $this->mortgage_price,
            'rent_price' => $this->rent_price,
            'description' => $this->description,
            'slug' => $this->slug,
            'terms' => $this->terms->pluck('id'),
            'bool_facilities' => $this->boolfacilities->pluck('id'),
            'province' => $this->province->title,
            'city' => $this->city->title,
            'region' => $this->region->title,
            'neighborhood' => $this->neighborhood->title,
            'address' => $this->address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'type' => $this->type,
            'delete_main_picture' => $this->main_picture ? Gallery::$prefix_images . $this->main_picture : null,
            'delete_galleries' => $this->galleries->pluck('path', 'id')->map(function ($item, $key) {
                return Gallery::$prefix_images.$item;
            }),
        ];

        foreach ($this->intfacilities as $int_facility) {
            $estate['int_facilities[' . $int_facility->id . ']'] = $int_facility->pivot->value;
        }


        foreach ($this->txtfacilities as $txt_facility) {
            $estate['txt_facilities[' . $txt_facility->id . ']'] = $txt_facility->pivot->value;
        }
        return $estate;
    }
}
