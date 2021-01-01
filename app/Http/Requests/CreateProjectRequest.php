<?php

namespace App\Http\Requests;

use App\Models\Region;
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
            'code'                      => 'required',
            'title'                     => 'required',
            'pap_type_id'               => 'required',
            'regular_program'           => 'required',
            'description'               => 'required',
            'spatial_coverage_id'       => 'required',
            'iccable'                   => 'required|bool',
            'pip'                       => 'required|bool',
            'pip_typology_id'           => 'required_if:pip,true',
            'research'                  => 'required_if:pip_typology_id,2',
            'cip'                       => 'required|bool',
            'cip_type_id'               => 'required_if:cip,true',
            'trip'                      => 'required|bool',
            'rdip'                      => 'required|bool',
            'rdc_endorsement_required'  => 'required_if:rdip,true|bool',
            'rdc_endorsed'              => 'required_if:rdc_endorsement_required,true|bool',
            'rdc_endorsed_date'         => 'required_if:rdc_endorsed,true|date',
            'other_infrastructure'      => 'required',
            'risk'                      => 'required_if:trip,true',
            'pdp_chapter_id'            => 'required',
            'no_pdp_indicator'          => 'required',
            'gad_id'                    => 'required',
            'target_start_year'         => 'required',
            'target_end_year'           => 'required',
            'has_fs'                    => 'required|bool',
            'has_row'                   => 'required|bool',
            'has_rap'                   => 'required|bool',
            'employment_generated'      => 'required',
            'funding_source_id'         => 'required',
            'implementation_mode_id'    => 'required',
            'other_fs'                  => 'required',
            'project_status_id'         => 'required',
            'updates'                   => 'required',
            'updates_date'              => 'required',
            'uacs_code'                 => 'required',
            'tier_id'                   => 'required',
            'approval_level_id'         => 'required',
            'approval_date'             => 'required',

//            'regions'                   => ['required','array', function($attribute, $value, $fail) {
//                                                $count = Region::whereIn('id', $value)->count();
//                                                if (count($value) !== $count) {
//                                                    $fail($attribute . ' is invalid.');
//                                                }
//                                            }],
//            'bases'                     => 'array',
//            'funding_sources'           => 'array',
//            'funding_institutions'      => 'array',
//            'implementing_agencies'     => 'array',
//            'pdp_chapters'              => 'array',
//            'prerequisites'             => 'array',
//            'sdgs'                      => 'array',
//            'ten_point_agendas'         => 'array',
//            'allocation'                => 'sometimes',
//            'disbursement'              => 'required',
//            'feasibility_study'         => 'required',
//            'nep'                       => 'required',
//            'resettlement_action_plan'  => 'required',
//            'right_of_way'              => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'        => 'The PAP Title is required.',
            'pap_type_id.required'  => 'The PAP Type is required.',
            'pap_type_id.exists'    => 'The given PAP Type is not valid.',
        ];
    }
}
