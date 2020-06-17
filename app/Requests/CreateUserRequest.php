<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name'                  => 'required',
            'email'                 => 'required|unique:users|email',
            'password'              => 'required',
            'password_confirmation' => 'required|same:password',
            'address'               => 'required',
            'phone'                 => 'required|digits:10|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('The name field is required'),
            'email.required' => __('The email field is required'),
            'email.email' => __('The email must be a valid email address'),
            'email.unique' => __('The email has already been taken'),
            'password.required' => __('The password field is required'),
            'password_confirmation.required' => __('The password_confirmation field is required'),
            'password_confirmation.same' => __('The password confirmation and password must match'),
            'address.required' => __('The address field is required'),
            'phone.required' => __('The phone field is required'),
            'phone.digits' => __('The phone must be 10 digits'),
            'phone.numeric' => __('The phone must be a number'),
        ];
    }
}
