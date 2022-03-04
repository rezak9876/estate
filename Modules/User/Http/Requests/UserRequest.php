<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{

     public function nullable_password()
    {
        if (request()->_method == 'patch')
            return 'nullable|';
        return '';
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'role_id' => 'required',
            'phone' => 'nullable|regex:/^0\d{10}$/',
            'mobile' => 'required|regex:/0?9[0-9][0-9]{8}/',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(request()->user),
            ],
            'password' => $this->nullable_password().'confirmed|regex:/^(?=.*[a-zA-Z])(?=.*[0-9])/',
            'picture' => 'mimes:jpeg,jpg,png,gif|max:1000',
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
