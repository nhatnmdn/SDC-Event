<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestCreateEvent extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' =>'required|unique:events,name,'.$this->id,
            'place' =>'required',
            'intro' =>'required',
            'detail' =>'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'max_register' => 'required',
            'chairman' => 'required',
            'avatar'  => 'image',
            
        ];
    }

    public function messages(){
        return [
            
            'name.required' => 'Trường này không được để trống',
            'name.unique' => 'Tên sự kiện đã tồn tại',
            'place.required' => 'Trường này không được để trống',
            'intro.required' => 'Trường này không được để trống',
            'detail.required' => 'Trường này không được để trống',
            'time_start.required' => 'Thời gian không được để trống',
            'time_end.required' => 'Thời gian không được để trống',
            'max_register.required' => ' Vui lòng nhập số người đăng kí',
            'chairman.required' => ' Vui lòng nhập người diễn giả',
            
        ];
    }

    
}
