<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title'                     => 'required',
            'pap_type_id'               => 'required',
            'cip_type_id'               => 'required',
            'funding_source_id'         => 'required',
            'gad_id'                    => 'required',
            'implementation_mode_id'    => 'required',
            'pdp_chapter_id'            => 'required',
            'project_status_id'         => 'required',
            'spatial_coverage_id'       => 'required',
            'tier_id'                   => 'required',
            'iccable'                   => 'required|boolean',
            'approval_level_id'         => 'sometimes',
            'updates'                   => 'required',
            'updates_date'              => 'required',
        ];
    }
}
