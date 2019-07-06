<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhoaPhamRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'txtMonHoc'=>'required | unique:kpt,monhoc',
            'txtGiaTien' => 'required',
            'txtGiangVien' => 'required',
            'fImages' =>'required|image | max: 1050'
        ];
    }
    public function messages(){
        return [
            'txtMonHoc.required'=>'Vui lòng nhập tên môn học',
            'txtGiaTien.required'=>'Vui lòng nhập giá tiền',
            'txtGiangVien.required'=>'Vui lòng nhập tên giảng viên',
            'txtMonHoc.unique' => 'Tên môn học đã tồn tại',
            'fImages.required' => 'Chưa chèn hình ảnh',
            'fImages.image' => 'Loại hình ảnh không hợp lệ'
        ];
    }
}
