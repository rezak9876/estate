<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{


    protected function prepareForValidation()
    {
        // set user for request come from edit profile (to execpt email validation)
        if (Route::current()->getName() == 'admin.edit_profile') {
            request()->user = Auth::user();

            //set role if for request come from edit profile
            $this->merge([
                'role_id' => Auth::user()->role->id,
            ]);
        }
    }
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
            'phone' => 'nullable|numeric',
            'mobile' => 'required|regex:/(?:0)?(9\d{9})$/',
            'email' => [
                'nullable',
                'email',
                Rule::unique('users')->ignore(request()->user),
            ],
            'password' => $this->nullable_password() . 'confirmed|regex:/^(?=.*[a-zA-Z])(?=.*[0-9])/',
            'picture' => 'image|mimes:jpeg,jpg,png,gif|max:5000',
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
