<?php

namespace Modules\Estate\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Modules\Estate\Entities\Estate;

class EstateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $login_user = Auth::user();
        return [
            'id' => $this->id,
            'title' => $this->title,
            'type' => $this->gettypeName(),
            'deletable' => $login_user->can('delete', Estate::where('id',$this->id)->first()),
            'editable' => $login_user->can('update', Estate::where('id',$this->id)->first()),
        ];
    }
}
