<?php

namespace Modules\Search\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Estate\Entities\Estate;

class MarkerClusterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $response = [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'title' => $this->title,
            'type' => $this->type,
            'link' => $request->getSchemeAndHttpHost() . '/estates/' . $this->slug,
            'image' => $this->main_picture ? $this->thumbnail_picture() : "/findeo/images/listing-03.jpg",
        ];

        if ($this->type == Estate::Mortgage_Rent)
            $response['prices'] = [
                [
                    'type_title' => "قیمت رهن",
                    'price' => $this->mortgage_price
                ],
                [
                    'type_title' => "قیمت اجاره",
                    'price' => $this->rent_price
                ],
            ];
        else
            $response['prices'] = [
                [
                    'type_title' => "قیمت خرید",
                    'price' => $this->total_price
                ],
            ];
        return $response;
    }
}
