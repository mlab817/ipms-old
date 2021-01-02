<?php

namespace App\Http\Requests;

use App\Models\Region;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
    public function rules()
    {
        return [
            'code'                              => 'nullable|string',
            'title'                             => 'required|max:255',
            'pap_type_id'                       => 'required|exists:pap_types,id',
            'regular_program'                   => 'required|bool',
            'description'                       => 'required|max:1000',
            'expected_outputs'                  => 'required|max:1000',
            'spatial_coverage_id'               => 'required|exists:spatial_coverages,id',
            'iccable'                           => 'required|bool',
            'approval_level_id'                 => 'required_if:iccable,true|exists:approval_levels,id',
            'approval_date'                     => 'required_with:approval_level_id',
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
            'other_infrastructure'              => 'nullable',
            'risk'                              => 'required_if:trip,true',
            'pdp_chapter_id'                    => 'required_if:no_pdp_indicator,false',
            'no_pdp_indicator'                  => 'required',
            'gad_id'                            => 'required_if:cip,true|exists:gads,id',
            'target_start_year'                 => 'required|int|min:2000',
            'target_end_year'                   => 'required|int|gte:target_start_year',
            'has_fs'                            => 'required|bool',
            'has_row'                           => 'required|bool',
            'has_rap'                           => 'required|bool',
            'employment_generated'              => 'nullable|string',
            'funding_source_id'                 => 'required|exists:funding_sources,id',
            'implementation_mode_id'            => 'required|exists:implementation_modes,id',
            'other_fs'                          => 'nullable',
            'project_status_id'                 => 'required|exists:project_statuses,id',
            'updates'                           => 'required|max:1000',
            'updates_date'                      => 'required|date',
            'uacs_code'                         => 'sometimes|string',
            'tier_id'                           => 'required|exists:tiers,id',
            'regions'                           => ['exclude_unless:spatial_coverage_id,2','array', function($attribute, $value, $fail) {
                                                    $count = Region::whereIn('id', $value)->count();
                                                    if (count($value) !== $count) {
                                                        $fail($attribute . ' is invalid.');
                                                    }
                                                }],
            'bases'                             => 'sometimes|array',
            'funding_sources'                   => 'required|array',
            'funding_institutions'              => 'exclude_unless:funding_source_id,2|array',
            'implementing_agencies'             => 'required|array',
            'pdp_chapters'                      => 'sometimes|array',
            'prerequisites'                     => 'sometimes|array',
            'sdgs'                              => 'sometimes|array',
            'ten_point_agendas'                 => 'sometimes|array',
            'feasibility_study'                 => 'required_if:has_fs,true|exclude_if:has_fs,false',
            'feasibility_study.fs_status_id'    => 'exists:fs_statuses,id',
            'feasibility_study.needs_assistance'=> 'bool',
            'feasibility_study.y2017'           => 'numeric|min:0',
//            'feasibility_study.project_id'      => ['sometimes', function($attribute, $value, $fail) {
//                                                    if ($value != $this->input('id')) {
//                                                        $fail('This feasibility study does not belong to this project.');
//                                                    }
//                                                }],
            'feasibility_study.y2018'           => 'numeric|min:0',
            'feasibility_study.y2019'           => 'numeric|min:0',
            'feasibility_study.y2020'           => 'numeric|min:0',
            'feasibility_study.y2021'           => 'numeric|min:0',
            'feasibility_study.y2022'           => 'numeric|min:0',
            'feasibility_study.y2023'           => 'numeric|min:0',
            'feasibility_study.y2024'           => 'numeric|min:0',
            'feasibility_study.y2025'           => 'numeric|min:0',
            'right_of_way'                      => 'required_if:has_row,true|exclude_if:has_row,false',
//            'right_of_way.project_id'           => ['sometimes', function($attribute, $value, $fail) {
//                                                        if ($value != $this->input('id')) {
//                                                            $fail('This right of way does not belong to this project.');
//                                                        }
//                                                    }],
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
//            'resettlement_action_plan.project_id' => ['sometimes', function($attribute, $value, $fail) {
//                                                        if ($value != $this->input('id')) {
//                                                            $fail('This right of way does not belong to this project.');
//                                                        }
//                                                    }],
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
//            'nep.project_id' => ['sometimes', function($attribute, $value, $fail) {
//                                                        if ($value != $this->input('id')) {
//                                                            $fail('This right of way does not belong to this project.');
//                                                        }
//                                                    }],
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
//            'allocation.project_id'             => ['sometimes', function($attribute, $value, $fail) {
//                                                        if ($value != $this->input('id')) {
//                                                            $fail('This right of way does not belong to this project.');
//                                                        }
//                                                    }],
            'allocation.y2016'                  => 'numeric|lte:nep.y2016|min:0',
            'allocation.y2017'                  => 'numeric|lte:nep.y2017|min:0',
            'allocation.y2018'                  => 'numeric|lte:nep.y2018|min:0',
            'allocation.y2019'                  => 'numeric|lte:nep.y2019|min:0',
            'allocation.y2020'                  => 'numeric|lte:nep.y2020|min:0',
            'allocation.y2021'                  => 'numeric|lte:nep.y2021|min:0',
            'allocation.y2022'                  => 'numeric|lte:nep.y2022|min:0',
            'allocation.y2023'                  => 'numeric|lte:nep.y2023|min:0',
            'allocation.y2024'                  => 'numeric|lte:nep.y2024|min:0',
            'allocation.y2025'                  => 'numeric|lte:nep.y2025|min:0',
            'disbursement'                      => 'required_if:project_status_id,2',
//            'disbursement.project_id'           => ['sometimes', function($attribute, $value, $fail) {
//                                                        if ($value != $this->input('id')) {
//                                                            $fail('This right of way does not belong to this project.');
//                                                        }
//                                                    }],
            'disbursement.y2016'                => 'numeric|lte:allocation.y2016|min:0',
            'disbursement.y2017'                => 'numeric|lte:allocation.y2017|min:0',
            'disbursement.y2018'                => 'numeric|lte:allocation.y2018|min:0',
            'disbursement.y2019'                => 'numeric|lte:allocation.y2019|min:0',
            'disbursement.y2020'                => 'numeric|lte:allocation.y2020|min:0',
            'disbursement.y2021'                => 'numeric|lte:allocation.y2021|min:0',
            'disbursement.y2022'                => 'numeric|lte:allocation.y2022|min:0',
            'disbursement.y2023'                => 'numeric|lte:allocation.y2023|min:0',
            'disbursement.y2024'                => 'numeric|lte:allocation.y2024|min:0',
            'disbursement.y2025'                => 'numeric|lte:allocation.y2025|min:0',
        ];
    }
}
