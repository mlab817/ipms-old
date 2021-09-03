<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvitationStoreRequest extends FormRequest
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
            'email' => 'required|email|unique:invitations',
            'office_id'     => 'required|exists:offices,id',
        ];
    }

    public function messages()
    {
        return [
            'email.unique'  => 'Invitation with this email address already requested.',
        ];
    }
}
