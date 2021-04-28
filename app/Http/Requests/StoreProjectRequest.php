<?php

namespace App\Http\Requests;

use App\Models\Region;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

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
     * Prepare data before validation
     * Also useful for formatting data
     *
     * @returns $this
     */
    public function prepareForValidation()
    {
        $this->merge([
            'total_project_cost' => str_replace(',', '', $this->total_project_cost)
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        // Note: The following fields will be moved to validation: pip, pip_typology_id, cip, cip_type_id, trip, rdip
        // which will form part of the validation
        return [
            'code'                              => 'nullable|string',
            'title'                             => 'required|max:255',
            'pap_type_id'                       => 'required|exists:pap_types,id',
            'regular_program'                   => 'required|bool',
            'bases'                             => 'required',
            'description'                       => 'required|max:1000',
            'expected_outputs'                  => 'required|max:1000',
            'total_project_cost'                => 'required|numeric',
            'project_status_id'                 => 'required|exists:project_statuses,id',
            'spatial_coverage_id'               => 'required|exists:spatial_coverages,id',
            'regions'                           => 'required',
//            'pip'                               => 'required|bool',
//            'pip_typology_id'                   => 'required_if:pip,true',
////            'research'                          => 'required_if:pip_typology_id,2',
//            'cip'                               => 'required|bool',
//            'cip_type_id'                       => 'required_if:cip,true',
//            'trip'                              => 'nullable|bool',
            'rdip'                              => 'required|bool',
            'rdc_endorsement_required'          => 'required_if:rdip,true|bool',
            'rdc_endorsed'                      => 'required_if:rdc_endorsement_required,true|bool',
            'rdc_endorsed_date'                 => 'nullable|required_if:rdc_endorsed,1|date',
            'iccable'                           => 'required_if:cip,true|bool',
            'approval_level_id'                 => 'required_if:iccable,1|exists:approval_levels,id',
            'approval_date'                     => 'required_with:approval_level_id',
            'other_infrastructure'              => 'nullable',
            'risk'                              => 'required_if:trip,true',
            'pdp_chapter_id'                    => 'required',
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
            'employment_generated'              => 'nullable|string',
            'funding_source_id'                 => 'required|exists:funding_sources,id',
            'implementation_mode_id'            => 'required|exists:implementation_modes,id',
            'other_fs'                          => 'nullable',
            'updates'                           => 'required|max:1000',
            'updates_date'                      => 'required|date',
            'uacs_code'                         => 'nullable',
            'tier_id'                           => 'required|exists:tiers,id',
            'funding_sources'                   => 'nullable|array',
            'funding_institutions'              => 'exclude_unless:funding_source_id,2|array',
            'implementing_agencies'             => 'sometimes|array',
            'pdp_chapters'                      => 'nullable|array',
            'prerequisites'                     => 'nullable|array',
            'sdgs'                              => 'nullable|array',
            'pdp_indicators'                    => 'nullable|array',
            'ten_point_agendas'                 => 'nullable|array',
            'nep.*'                             => 'required_if:project_status_id,2',
            'nep.y2016'                         => 'numeric|min:0',
            'nep.y2017'                         => 'numeric|min:0',
            'nep.y2018'                         => 'numeric|min:0',
            'nep.y2019'                         => 'numeric|min:0',
            'nep.y2020'                         => 'numeric|min:0',
            'nep.y2021'                         => 'numeric|min:0',
//            'nep.y2022'                         => 'numeric|min:0',
//            'nep.y2023'                         => 'numeric|min:0',
//            'nep.y2024'                         => 'numeric|min:0',
//            'nep.y2025'                         => 'numeric|min:0',
            'allocation.*'                        => 'required_if:project_status_id,2',
            'allocation.y2016'                  => 'numeric|lte:nep.y2016|min:0',
            'allocation.y2017'                  => 'numeric|lte:nep.y2017|min:0',
            'allocation.y2018'                  => 'numeric|lte:nep.y2018|min:0',
            'allocation.y2019'                  => 'numeric|lte:nep.y2019|min:0',
            'allocation.y2020'                  => 'numeric|lte:nep.y2020|min:0',
            'allocation.y2021'                  => 'numeric|lte:nep.y2021|min:0',
//            'allocation.y2022'                  => 'numeric|lte:nep.y2022|min:0',
//            'allocation.y2023'                  => 'numeric|lte:nep.y2023|min:0',
//            'allocation.y2024'                  => 'numeric|lte:nep.y2024|min:0',
//            'allocation.y2025'                  => 'numeric|lte:nep.y2025|min:0',
            'disbursement.*'                    => 'required_if:project_status_id,2',
            'disbursement.y2016'                => 'numeric|lte:allocation.y2016|min:0',
            'disbursement.y2017'                => 'numeric|lte:allocation.y2017|min:0',
            'disbursement.y2018'                => 'numeric|lte:allocation.y2018|min:0',
            'disbursement.y2019'                => 'numeric|lte:allocation.y2019|min:0',
            'disbursement.y2020'                => 'numeric|lte:allocation.y2020|min:0',
            'disbursement.y2021'                => 'numeric|lte:allocation.y2021|min:0',
//            'disbursement.y2022'                => 'numeric|lte:allocation.y2022|min:0',
//            'disbursement.y2023'                => 'numeric|lte:allocation.y2023|min:0',
//            'disbursement.y2024'                => 'numeric|lte:allocation.y2024|min:0',
//            'disbursement.y2025'                => 'numeric|lte:allocation.y2025|min:0',
//            'ou_investments'                    => 'sometimes|array',
//            'ou_investments.*.ou_id'            => 'required|exists:operating_units,id',
//            'ou_investments.*.y2016'            => 'required|min:0|numeric',
//            'ou_investments.*.y2017'            => 'required|min:0|numeric',
//            'ou_investments.*.y2018'            => 'required|min:0|numeric',
//            'ou_investments.*.y2019'            => 'required|min:0|numeric',
//            'ou_investments.*.y2020'            => 'required|min:0|numeric',
//            'ou_investments.*.y2021'            => 'required|min:0|numeric',
//            'ou_investments.*.y2022'            => 'required|min:0|numeric',
//            'ou_investments.*.y2023'            => 'required|min:0|numeric',
//            'ou_investments.*.y2024'            => 'required|min:0|numeric',
//            'ou_investments.*.y2025'            => 'required|min:0|numeric',
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
//            'region_investments.*.y2024'        => 'required|min:0:numeric',
//            'region_investments.*.y2025'        => 'required|min:0:numeric',
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
//            'fs_investments.*.y2024'            => 'required|min:0:numeric',
//            'fs_investments.*.y2025'            => 'required|min:0:numeric',
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
            'regions.required'      => 'The regions field is required. Choose Not Applicable if there are no regions covered by this PAP.',
        ];
    }
}
