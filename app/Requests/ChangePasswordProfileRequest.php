<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current_password'      => 'required',
            'new_password'          => 'required|different:current_password',
            'password_confirmation' => 'required|same:new_password',
        ];
    }

    public function messages()
    {
        return [
            'current_password.required'      => __('The current password field is required'),
            'new_password.required'          => __('The new password field is required'),
            'new_password.different'         => __('The new password and current password must be different'),
            'password_confirmation.required' => __('The password confirmation field is required'),
            'password_confirmation.same'     => __('The password confirmation and new password must match'),
        ];
    }
}
