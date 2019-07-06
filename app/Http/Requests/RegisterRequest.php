<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' =>'required',
            'email' =>'required|unique:users,email',
            'password'=>'required'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Vui lòng nhập name',
            'email.required' =>'Vui lòng nhập Email',
            'email.unique' =>'Email này đã tồn tại rồi',
            'password.required' =>'Vui lòng nhập password'
        ];
    }
}
