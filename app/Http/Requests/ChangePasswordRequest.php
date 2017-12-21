<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'password' => 'required|min:5',
            'password_new' => 'required|min:5',
            'password_confirm' => 'required|min:5',
        ];
    }

    public function messages() {
        return [
            'password.required' => 'Vui lòng nhập vào trường này.',
            'password.min' => 'Mật Khẩu nhập ít nhất 5 ký tự.',
            'password_new.required' => 'Vui lòng nhập vào trường này.',
            'password_new.min' => 'Mật Khẩu mới nhập ít nhất 5 ký tự.',
            'password_confirm.required' => 'Vui lòng nhập vào trường này.',
            'password_confirm.min' => 'Mật Khẩu nhập lại, nhập ít nhất 5 ký tự.',
        ];
    }
}
