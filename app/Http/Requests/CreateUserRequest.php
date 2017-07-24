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
            //
            'username' => 'required|min:5',
            'password' => 'required',
        ];
    }
    public function messages() {
        return [
        'username.required' => 'Vui long nhap ten',
        'username.min' => 'Vui long nhap lon hon 5 ky tu',
        'password.required' => 'Vui long nhap mat khau',

        ]
    }
}
