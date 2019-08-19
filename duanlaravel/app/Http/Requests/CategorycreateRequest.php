<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategorycreateRequest extends FormRequest
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
            'category_code' => 'required|min:3|max:50|unique:categories', //tên table cusc_chude
            'category_name' => 'required|min:3|max:50|', //category_name la name tren form
            'decription' => 'required|min:3|max:50|',
        ];
    }
    public function messages()
    {
        return [
            'category_code.required' => 'Tên chủ đề bắt buộc nhập',
            'category_code.min' => 'Tên chủ đề ít nhất phải 3 ký tự trở lên',
            'category_code.max' => 'Tên chủ đề tối đa chỉ 50 ký tự',
            'category_code.unique' => 'Tên chủ đề này đã tồn tại. Vui lòng nhập tên chủ đề khác',
            'category_name.required' => 'Tên chủ đề bắt buộc nhập',
            'category_name.min' => 'Tên chủ đề ít nhất phải 3 ký tự trở lên',
            'category_name.max' => 'Tên chủ đề tối đa chỉ 50 ký tự',
            'decription.required' => 'Tên chủ đề bắt buộc nhập',
            'decription.min' => 'Tên chủ đề bắt buộc nhập',
            'decription.max' => 'Tên chủ đề bắt buộc nhập',
        ];
    }
}
