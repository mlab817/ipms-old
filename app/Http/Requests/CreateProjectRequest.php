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
            'title'                     => 'required|bail|max:255',
            'pap_type_id'               => 'required|exists:pap_types,id',
            'description'               => 'required|max:1000',
            'cip_type_id'               => 'nullable|exists:cip_types,id',
            'funding_source_id'         => 'required|exists:funding_sources,id',
            'gad_id'                    => 'nullable|exists:gads,id',
            'implementation_mode_id'    => 'nullable|exists:implementation_modes,id',
            'pdp_chapter_id'            => 'required|exists:pdp_chapters,id',
            'project_status_id'         => 'required|exists:project_statuses,id',
            'spatial_coverage_id'       => 'required|exists:spatial_coverages,id',
            'tier_id'                   => 'required|exists:tiers,id',
            'iccable'                   => 'required|boolean',
            'approval_level_id'         => 'required',
            'updates'                   => 'required',
            'updates_date'              => 'required',
            'code'  => '',
            'title' => '',
            'pap_type_id'   => '',
            'regular_program'   => '',
            'description'   => '',
            'spatial_coverage_id'   => '',
            'iccable'   => '',
            'pip'   => '',
            'research'  => '',
            'cip'   => '',
            'cip_type_id'   => '',
            'trip'  => '',
            'rdip'  => '',
            'rdc_endorsement_required'  => '',
            'rdc_endorsed'  => '',
            'rdc_endorsed_date' => '',
            'other_infrastructure'  => '',
            'risk'  => '',
            'pdp_chapter_id'    => '',
            'no_pdp_indicator'  => '',
            'gad_id'    => '',
            'target_start_year' => '',
            'target_end_year'   => '',
            'has_fs'    => '',
            'has_row'   => '',
            'has_rap'   => '',
            'employment_generated'  => '',
            'funding_source_id' => '',
            'implementation_mode_id'    => '',
            'other_fs'  => '',
            'project_status_id' => '',
            'updates'   => '',
            'updates_date'  => '',
            'uacs_code' => '',
            'tier_id'   => '',
            'approval_level_id' => '',
            'approval_date' => '',

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
