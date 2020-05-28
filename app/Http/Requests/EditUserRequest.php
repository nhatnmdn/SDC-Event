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
            'phone'   => 'required|digits:10',
            'address' => 'required',
            'avatar'  => 'image',
        ];
    }
}
