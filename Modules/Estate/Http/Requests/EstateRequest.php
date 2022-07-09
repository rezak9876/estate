<?php

namespace Modules\Estate\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EstateRequest extends FormRequest
{

    public function prepareForValidation()
    {

        $slug = $this->slug;
        $slug = str_replace(" ", "_", $slug);
        $slug = str_replace("/", "_", $slug);
        $this->merge([
            'slug' => $slug,
        ]);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => 'required',
            'area' => 'required|regex:/^\d+$/',
            'year_of_construction' => 'required|integer|between:1281,' . verta()->year,
            'total_price' => 'regex:/^\d+([.]\d+)?$/',
            'mortgage_price' => 'regex:/^\d+([.]\d+)?$/',
            'rent_price' => 'regex:/^\d+([.]\d+)?$/',
            'title' => 'required',
            'use_type_property_id' => 'required',
            'address' => 'required',
            'description' => 'required',
            'slug' => [
                'required',
                Rule::unique('estates')->ignore(request()->estate),
            ],
            'main_picture' => 'image|mimes:jpeg,jpg,png,gif|max:5000',
            'galleries.*' => 'image|mimes:jpeg,jpg,png,gif|max:5000',
            'province' => 'required',
            'city' => 'required',
            'latitude' => 'required',
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
