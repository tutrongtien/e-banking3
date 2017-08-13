<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'identity_card' => 'required|digits_between:9,12',
            'date_of_identity_card' => 'required|date',
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'phone' => 'required|digits_between:10,11',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'ward' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users|confirmed',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'email.unique'   => 'Email này đã được sử dụng',
        ];
    }
}
