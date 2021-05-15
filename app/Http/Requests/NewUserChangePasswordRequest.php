<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewUserChangePasswordRequest extends FormRequest
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
            'password' => 'required|string|min:8|max:15|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Password is required',
            'password.confirmed'=> 'Password does not match',
        ];
    }
}
