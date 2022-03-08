<?php

namespace Modules\Setting\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'logo' => 'image|mimes:jpeg,jpg,png,gif|max:1000',
            'faIco' => 'image|mimes:jpeg,jpg,png,gif|max:1000',
            'watermark' => 'image|mimes:jpeg,jpg,png,gif|max:1000',
            'main_page_pic' => 'image|mimes:jpeg,jpg,png,gif|max:1000',
            'search_page_pic' => 'image|mimes:jpeg,jpg,png,gif|max:1000',
            'socialTelegram' => 'active_url',
            'socialInstagram' => 'active_url',
            'socialFacebook' => 'active_url',
            'socialTwitter' => 'active_url',
            'socialYoutube' => 'active_url',
            'socialWhatsapp' => 'active_url',
            'mobile' => 'nullable|regex:/(?:0)?(9\d{9})$/',
            'mobile2' => 'nullable|regex:/(?:0)?(9\d{9})$/',
            'mobile3' => 'nullable|regex:/(?:0)?(9\d{9})$/',
            'phone' => 'nullable|numeric',
            'phone2' => 'nullable|numeric',
            'phone3' => 'nullable|numeric',
            'email' => 'email',
            'email2' => 'email',
            'email3' => 'email',
                
            'mobileWhatsup' => 'nullable|regex:/(?:0)?(9\d{9})$/',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
