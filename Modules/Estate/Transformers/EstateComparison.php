<?php

namespace Modules\Estate\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Estate\Entities\Estate;

class EstateComparison extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $reponse = [
            'id' => $this->id,
            'title' => $this->title,
            'type' => $this->type,
            'type_name' => $this->gettypeName(),
            'main_picture' => $this->thumbnail_picture(),
        ];

        if ($this->type == Estate::Mortgage_Rent) {
            $reponse['rent_price'] = $this->rent_price;
            $reponse['mortgage_price'] = $this->mortgage_price;
        } else {
            $reponse['total_price'] = $this->total_price;
        }
        return $reponse;
    }
}
