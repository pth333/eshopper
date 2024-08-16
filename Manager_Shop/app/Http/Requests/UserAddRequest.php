<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|lowercase|max:255|unique:users',
            'password' => 'required',
            'role_id' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'name' => [
                'required' => 'Tên không được để trống',
                'string' => 'Tên phải là chuỗi',
                'max' => 'Tối đa 50 ký tự'
            ],
            'email' => [
                'required' => 'Email không được để trống',
                'string' => 'Email phải là chuỗi',
                'email' => 'Email không hợp lệ',
                'max' => 'Email tối đa 255 ký tự',
                'unique' => 'Email đã tồn tại',
            ],
            'password' => 'Mật khẩu là bắt buộc',
            'role_id' => 'Vai trò không được để trống'
        ];
    }
}
