<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectReviewStoreRequest extends FormRequest
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
            'pip'               => 'required|bool',
            'pip_typology_id'   => 'required|bool',
            'cip'               => 'required|bool',
            'cip_type_id'       => 'required|exists:cip_types,id',
            'trip'              => 'required|bool',
            'readiness_level_id'=> 'required|exists:readiness_levels,id',
            'comments'          => 'nullable',
        ];
    }
}
