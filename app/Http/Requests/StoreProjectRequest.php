<?php

namespace App\Http\Requests;

use App\Models\Region;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'code'                              => 'nullable|string',
            'title'                             => 'required|max:255',
            'pap_type_id'                       => 'required|exists:pap_types,id',
            'regular_program'                   => 'required|bool',
            'description'                       => 'required|max:1000',
            'expected_outputs'                  => 'required|max:1000',
            'spatial_coverage_id'               => 'required|exists:spatial_coverages,id',
            'pip'                               => 'required|bool',
            'pip_typology_id'                   => 'required_if:pip,true',
            'research'                          => 'required_if:pip_typology_id,2',
            'cip'                               => 'required|bool',
            'cip_type_id'                       => 'required_if:cip,true',
            'iccable'                           => 'required_if:cip,true|bool',
            'approval_level_id'                 => 'required_if:iccable,true|exists:approval_levels,id',
            'approval_date'                     => 'required_with:approval_level_id',
            'trip'                              => 'required|bool',
            'rdip'                              => 'required|bool',
            'rdc_endorsement_required'          => 'required_if:rdip,true|bool',
            'rdc_endorsed'                      => 'required_if:rdc_endorsement_required,true|bool',
            'rdc_endorsed_date'                 => 'required_if:rdc_endorsed,true|date',
            'other_infrastructure'              => 'nullable',
            'risk'                              => 'required_if:trip,true',
            'pdp_chapter_id'                    => 'required_if:no_pdp_indicator,false',
            'no_pdp_indicator'                  => 'sometimes|bool',
            'gad_id'                            => 'required_if:cip,true|exists:gads,id',
            'target_start_year'                 => 'required|int|min:2000',
            'target_end_year'                   => 'required|int|gte:target_start_year',
            'has_fs'                            => 'required|bool',
            'feasibility_study'                 => 'required_if:has_fs,true|exclude_if:has_fs,false',
            'feasibility_study.fs_status_id'    => 'exists:fs_statuses,id',
            'feasibility_study.needs_assistance'=> 'bool',
            'feasibility_study.y2016'           => 'numeric|min:0',
            'feasibility_study.y2017'           => 'numeric|min:0',
            'feasibility_study.y2018'           => 'numeric|min:0',
            'feasibility_study.y2019'           => 'numeric|min:0',
            'feasibility_study.y2020'           => 'numeric|min:0',
            'feasibility_study.y2021'           => 'numeric|min:0',
            'feasibility_study.y2022'           => 'numeric|min:0',
            'feasibility_study.y2023'           => 'numeric|min:0',
            'feasibility_study.y2024'           => 'numeric|min:0',
            'feasibility_study.y2025'           => 'numeric|min:0',
            'has_row'                           => 'required|bool',
            'right_of_way'                      => 'required_if:has_row,true|exclude_if:has_row,false',
            'right_of_way.y2016'                => 'numeric|min:0',
            'right_of_way.y2017'                => 'numeric|min:0',
            'right_of_way.y2018'                => 'numeric|min:0',
            'right_of_way.y2019'                => 'numeric|min:0',
            'right_of_way.y2020'                => 'numeric|min:0',
            'right_of_way.y2021'                => 'numeric|min:0',
            'right_of_way.y2022'                => 'numeric|min:0',
            'right_of_way.y2023'                => 'numeric|min:0',
            'right_of_way.y2024'                => 'numeric|min:0',
            'right_of_way.y2025'                => 'numeric|min:0',
            'right_of_way.affected_households'  => 'nullable|string',
            'has_rap'                           => 'required|bool',
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
            'resettlement_action_plan.affected_households'  => 'nullable|string',
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
            'funding_sources'                   => 'sometimes|array',
            'funding_institutions'              => 'exclude_unless:funding_source_id,2|array',
            'implementing_agencies'             => 'sometimes|array',
            'pdp_chapters'                      => 'sometimes|array',
            'prerequisites'                     => 'sometimes|array',
            'sdgs'                              => 'sometimes|array',
            'pdp_indicators'                    => 'sometimes|array',
            'ten_point_agendas'                 => 'sometimes|array',
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
            'ou_investments'                    => 'sometimes|array',
            'ou_investments.*.ou_id'            => 'required|exists:operating_units,id',
            'ou_investments.*.y2016'            => 'required|min:0|numeric',
            'ou_investments.*.y2017'            => 'required|min:0|numeric',
            'ou_investments.*.y2018'            => 'required|min:0|numeric',
            'ou_investments.*.y2019'            => 'required|min:0|numeric',
            'ou_investments.*.y2020'            => 'required|min:0|numeric',
            'ou_investments.*.y2021'            => 'required|min:0|numeric',
            'ou_investments.*.y2022'            => 'required|min:0|numeric',
            'ou_investments.*.y2023'            => 'required|min:0|numeric',
            'ou_investments.*.y2024'            => 'required|min:0|numeric',
            'ou_investments.*.y2025'            => 'required|min:0|numeric',
            'region_investments'                => 'sometimes|array',
            'region_investments.*.region_id'    => 'required|exists:regions,id',
            'region_investments.*.y2016'        => 'required|min:0:numeric',
            'region_investments.*.y2017'        => 'required|min:0:numeric',
            'region_investments.*.y2018'        => 'required|min:0:numeric',
            'region_investments.*.y2019'        => 'required|min:0:numeric',
            'region_investments.*.y2020'        => 'required|min:0:numeric',
            'region_investments.*.y2021'        => 'required|min:0:numeric',
            'region_investments.*.y2022'        => 'required|min:0:numeric',
            'region_investments.*.y2023'        => 'required|min:0:numeric',
            'region_investments.*.y2024'        => 'required|min:0:numeric',
            'region_investments.*.y2025'        => 'required|min:0:numeric',
            'fs_investments'                    => 'sometimes|array',
            'fs_investments.*.fs_id'            => 'required|exists:funding_sources,id',
            'fs_investments.*.y2016'            => 'required|min:0:numeric',
            'fs_investments.*.y2017'            => 'required|min:0:numeric',
            'fs_investments.*.y2018'            => 'required|min:0:numeric',
            'fs_investments.*.y2019'            => 'required|min:0:numeric',
            'fs_investments.*.y2020'            => 'required|min:0:numeric',
            'fs_investments.*.y2021'            => 'required|min:0:numeric',
            'fs_investments.*.y2022'            => 'required|min:0:numeric',
            'fs_investments.*.y2023'            => 'required|min:0:numeric',
            'fs_investments.*.y2024'            => 'required|min:0:numeric',
            'fs_investments.*.y2025'            => 'required|min:0:numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'        => 'The PAP Title is required.',
            'pap_type_id.required'  => 'The PAP Type is required.',
            'pap_type_id.exists'    => 'The given PAP Type is not valid.',
            'target_end_year.gte'   => 'The target end year must not be in the past.',
            'cip_type_id.required'  => 'The type of CIP is required.',
        ];
    }
}
