<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfficeStoreRequest extends FormRequest
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
            'operating_unit_id' => 'required',
            'name' => 'required',
            'acronym' => 'required',
            'email' => 'required|email',
            'contact_numbers' => 'required',
            'office_head_name' => 'required',
            'office_head_position' => 'required',
        ];
    }
}
