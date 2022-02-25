<?php

namespace Modules\Setting\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
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
            'title' => $this->title,
            'meta_description' => $this->meta_description,
            'themColor' => $this->themColor,
            'delete_logo' => $this->logo ? '/images/setting/' . $this->logo : null,
            'delete_faIco' => $this->faIco ? '/images/setting/' . $this->faIco : null,
            'delete_watermark' => $this->watermark ? '/images/setting/' . $this->watermark : null,
            'watermarkActive' => $this->watermarkActive,
            'watermarkPosition' => $this->watermarkPosition,
            'description' => $this->description,
            'enamad' => $this->enamad,
            'socialTelegram' => $this->socialTelegram,
            'socialInstagram' => $this->socialInstagram,
            'socialFacebook' => $this->socialFacebook,
            'socialTwitter' => $this->socialTwitter,
            'socialYoutube' => $this->socialYoutube,
            'socialWhatsapp' => $this->socialWhatsapp,
            'socialAparat' => $this->socialAparat,
            'delete_main_page_pic' => $this->main_page_pic ? '/images/setting/' . $this->main_page_pic : null,
            'delete_search_page_pic' => $this->search_page_pic ? '/images/setting/' . $this->search_page_pic : null,
            'maintenance' => $this->maintenance,
            'email' => $this->email,
            'email2' => $this->email2,
            'email3' => $this->email3,
            'mobile' => $this->mobile,
            'mobile2' => $this->mobile2,
            'mobile3' => $this->mobile3,
            'phone' => $this->phone,
            'phone2' => $this->phone2,
            'phone3' => $this->phone3,
            'fax' => $this->fax,
            'fax2' => $this->fax2,
            'fax3' => $this->fax3,
            'address' => $this->address,
            'address2' => $this->address2,
            'address3' => $this->address3,
            'mobileWhatsup' => $this->mobileWhatsup,
            'mobileWhatsupStatus' => $this->mobileWhatsupStatus,
            'mapGoogle' => $this->mapGoogle,
        ];
    }
}
