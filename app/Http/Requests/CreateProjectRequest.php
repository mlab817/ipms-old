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
            'code'                              => 'sometimes|string',
            'title'                             => 'required|max:255',
            'pap_type_id'                       => 'required|exists:pap_types,id',
            'regular_program'                   => 'required|bool',
            'description'                       => 'required|max:1000',
            'spatial_coverage_id'               => 'required|exists:spatial_coverages,id',
            'iccable'                           => 'required|bool',
            'pip'                               => 'required|bool',
            'pip_typology_id'                   => 'required_if:pip,true',
            'research'                          => 'required_if:pip_typology_id,2',
            'cip'                               => 'required|bool',
            'cip_type_id'                       => 'required_if:cip,true',
            'trip'                              => 'required|bool',
            'rdip'                              => 'required|bool',
            'rdc_endorsement_required'          => 'required_if:rdip,true|bool',
            'rdc_endorsed'                      => 'required_if:rdc_endorsement_required,true|bool',
            'rdc_endorsed_date'                 => 'required_if:rdc_endorsed,true|date',
            'other_infrastructure'              => 'sometimes',
            'risk'                              => 'required_if:trip,true',
            'pdp_chapter_id'                    => 'required_if:no_pdp_indicator,false',
            'no_pdp_indicator'                  => 'required',
            'gad_id'                            => 'required_if:cip,true|exists:gads,id',
            'target_start_year'                 => 'required|int|min:2000',
            'target_end_year'                   => 'required|int|gte:target_start_year',
            'has_fs'                            => 'required|bool',
            'has_row'                           => 'required|bool',
            'has_rap'                           => 'required|bool',
            'employment_generated'              => 'sometimes|string',
            'funding_source_id'                 => 'required|exists:funding_sources,id',
            'implementation_mode_id'            => 'required|exists:implementation_modes,id',
            'other_fs'                          => 'sometimes',
            'project_status_id'                 => 'required|exists:project_statuses,id',
            'updates'                           => 'required|max:1000',
            'updates_date'                      => 'required|date',
            'uacs_code'                         => 'sometimes|string',
            'tier_id'                           => 'required|exists:tiers,id',
            'approval_level_id'                 => 'required',
            'approval_date'                     => 'sometimes|date',

            'regions'                           => ['sometimes','array', function($attribute, $value, $fail) {
                                                    $count = Region::whereIn('id', $value)->count();
                                                    if (count($value) !== $count) {
                                                        $fail($attribute . ' is invalid.');
                                                    }
                                                }],
            'bases'                             => 'sometimes',
            'funding_sources'                   => 'required|array',
            'funding_institutions'              => 'sometimes|array',
            'implementing_agencies'             => 'required|array',
            'pdp_chapters'                      => 'sometimes|array',
            'prerequisites'                     => 'sometimes|array',
            'sdgs'                              => 'sometimes|array',
            'ten_point_agendas'                 => 'sometimes|array',
            'feasibility_study'                 => 'required_if:has_fs,true|exclude_if:has_fs,false',
            'feasibility_study.fs_status_id'    => 'exists:fs_statuses,id',
            'feasibility_study.needs_assistance'=> 'bool',
            'feasibility_study.y2017'           => 'numeric|min:0',
            'feasibility_study.y2018'           => 'numeric|min:0',
            'feasibility_study.y2019'           => 'numeric|min:0',
            'feasibility_study.y2020'           => 'numeric|min:0',
            'feasibility_study.y2021'           => 'numeric|min:0',
            'feasibility_study.y2022'           => 'numeric|min:0',
            'feasibility_study.y2023'           => 'numeric|min:0',
            'feasibility_study.y2024'           => 'numeric|min:0',
            'feasibility_study.y2025'           => 'numeric|min:0',
            'right_of_way'                      => 'required_if:has_row,true|exclude_if:has_row,false',
            'right_of_way.y2017'                => 'numeric|min:0',
            'right_of_way.y2018'                => 'numeric|min:0',
            'right_of_way.y2019'                => 'numeric|min:0',
            'right_of_way.y2020'                => 'numeric|min:0',
            'right_of_way.y2021'                => 'numeric|min:0',
            'right_of_way.y2022'                => 'numeric|min:0',
            'right_of_way.y2023'                => 'numeric|min:0',
            'right_of_way.y2024'                => 'numeric|min:0',
            'right_of_way.y2025'                => 'numeric|min:0',
            'right_of_way.affected_households'  => 'string',
            'resettlement_action_plan'          => 'required_if:has_rap,true|exclude_if:has_rap,false',
            'resettlement_action_plan.y2017'    => 'numeric|min:0',
            'resettlement_action_plan.y2018'    => 'numeric|min:0',
            'resettlement_action_plan.y2019'    => 'numeric|min:0',
            'resettlement_action_plan.y2020'    => 'numeric|min:0',
            'resettlement_action_plan.y2021'    => 'numeric|min:0',
            'resettlement_action_plan.y2022'    => 'numeric|min:0',
            'resettlement_action_plan.y2023'    => 'numeric|min:0',
            'resettlement_action_plan.y2024'    => 'numeric|min:0',
            'resettlement_action_plan.y2025'    => 'numeric|min:0',
            'resettlement_action_plan.affected_households'  => 'string',
            'nep'                               => 'required_if:project_status_id,2',
            'nep.y2016'                         => 'numeric|min:0',
            'nep.y2017'                         => 'numeric|min:0',
            'nep.y2018'                         => 'numeric|min:0',
            'nep.y2019'                         => 'numeric|min:0',
            'nep.y2020'                         => 'numeric|min:0',
            'nep.y2021'                         => 'numeric|min:0',
            'nep.y2022'                         => 'numeric|min:0',
            'nep.y2023'                         => 'numeric|min:0',
            'nep.y2024'                         => 'numeric|min:0',
            'nep.y2025'                         => 'numeric|min:0',
            'allocation'                        => 'required_if:project_status_id,2',
            'allocation.y2016'                  => 'numeric|min:0',
            'allocation.y2017'                  => 'numeric|min:0',
            'allocation.y2018'                  => 'numeric|min:0',
            'allocation.y2019'                  => 'numeric|min:0',
            'allocation.y2020'                  => 'numeric|min:0',
            'allocation.y2021'                  => 'numeric|min:0',
            'allocation.y2022'                  => 'numeric|min:0',
            'allocation.y2023'                  => 'numeric|min:0',
            'allocation.y2024'                  => 'numeric|min:0',
            'allocation.y2025'                  => 'numeric|min:0',
            'disbursement'                      => 'required_if:project_status_id,2',
            'disbursement.y2016'                => 'numeric|min:0',
            'disbursement.y2017'                => 'numeric|min:0',
            'disbursement.y2018'                => 'numeric|min:0',
            'disbursement.y2019'                => 'numeric|min:0',
            'disbursement.y2020'                => 'numeric|min:0',
            'disbursement.y2021'                => 'numeric|min:0',
            'disbursement.y2022'                => 'numeric|min:0',
            'disbursement.y2023'                => 'numeric|min:0',
            'disbursement.y2024'                => 'numeric|min:0',
            'disbursement.y2025'                => 'numeric|min:0',
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
