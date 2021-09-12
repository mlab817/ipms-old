<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseProjectStoreRequest extends FormRequest
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
            'title'         => 'required',
            'summary'       => 'required|max:125',
            'pap_type_id'   => 'required|exists:pap_types,id',
            'owner'         => 'required',
        ];
    }
}
