<?php

namespace App\Http\Requests;

use Auth;
use http\Client\Curl\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditUserRequest extends FormRequest
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
            'name'    => 'required',
            'email'   => ['required', Rule::unique('users')->ignore(Auth::id()), 'email'],
            'phone'   => 'required|digits:10|numeric',
            'address' => 'required',
            'avatar'  => 'image',
        ];
    }

    public function messages()
    {
        return [
            'name.required'    => __('The name field is required'),
            'email.required'   => __('The email field is required'),
            'email.email'      => __('The email must be a valid email address'),
            'email.unique'     => __('The email has already been taken'),
            'address.required' => __('The address field is required'),
            'phone.required'   => __('The phone field is required'),
            'phone.digits'     => __('The phone must be 10 digits'),
            'phone.numeric'    => __('The phone must be a number'),
            'avatar.image'     => __('The avatar must be an image'),
        ];
    }
}
