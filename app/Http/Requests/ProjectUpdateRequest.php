<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
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
     * Format the data prior to validation
     */
    public function prepareForValidation()
    {
        $this->merge([
            'feasibility_study'     => [
                'needs_assistance'  => $this->feasibility_study['needs_assistance'],
//                'y2016'     => str_replace(',', '', $this->feasibility_study['y2016']),
                'y2017'     => str_replace(',', '', $this->feasibility_study['y2017']),
                'y2018'     => str_replace(',', '', $this->feasibility_study['y2018']),
                'y2019'     => str_replace(',', '', $this->feasibility_study['y2019']),
                'y2020'     => str_replace(',', '', $this->feasibility_study['y2020']),
                'y2021'     => str_replace(',', '', $this->feasibility_study['y2021']),
                'y2022'     => str_replace(',', '', $this->feasibility_study['y2022']),
//                'y2023'     => str_replace(',', '', $this->feasibility_study['y2023']),
                'completion_date'  => $this->feasibility_study['completion_date'],
            ],
            'region_investments'    => collect($this->region_investments)->map(function($ri) {
                return [
                    'region_id' => $ri['region_id'],
                    'y2016'     => str_replace(',', '', $ri['y2016']),
                    'y2017'     => str_replace(',', '', $ri['y2017']),
                    'y2018'     => str_replace(',', '', $ri['y2018']),
                    'y2019'     => str_replace(',', '', $ri['y2019']),
                    'y2020'     => str_replace(',', '', $ri['y2020']),
                    'y2021'     => str_replace(',', '', $ri['y2021']),
                    'y2022'     => str_replace(',', '', $ri['y2022']),
                    'y2023'     => str_replace(',', '', $ri['y2023']),
                ];
            }),
            'fs_investments'        => collect($this->fs_investments)->map(function($fi) {
                return [
                    'fs_id'     => $fi['fs_id'],
                    'y2016'     => str_replace(',', '', $fi['y2016']),
                    'y2017'     => str_replace(',', '', $fi['y2017']),
                    'y2018'     => str_replace(',', '', $fi['y2018']),
                    'y2019'     => str_replace(',', '', $fi['y2019']),
                    'y2020'     => str_replace(',', '', $fi['y2020']),
                    'y2021'     => str_replace(',', '', $fi['y2021']),
                    'y2022'     => str_replace(',', '', $fi['y2022']),
                    'y2023'     => str_replace(',', '', $fi['y2023']),
                ];
            }),
            'nep'                   => [
                'y2016'     => str_replace(',', '', $this->nep['y2016']),
                'y2017'     => str_replace(',', '', $this->nep['y2017']),
                'y2018'     => str_replace(',', '', $this->nep['y2018']),
                'y2019'     => str_replace(',', '', $this->nep['y2019']),
                'y2020'     => str_replace(',', '', $this->nep['y2020']),
                'y2021'     => str_replace(',', '', $this->nep['y2021']),
                'y2022'     => str_replace(',', '', $this->nep['y2022']),
                'y2023'     => str_replace(',', '', $this->nep['y2023']),
            ],
            'allocation'            => [
                'y2016'     => str_replace(',', '', $this->allocation['y2016']),
                'y2017'     => str_replace(',', '', $this->allocation['y2017']),
                'y2018'     => str_replace(',', '', $this->allocation['y2018']),
                'y2019'     => str_replace(',', '', $this->allocation['y2019']),
                'y2020'     => str_replace(',', '', $this->allocation['y2020']),
                'y2021'     => str_replace(',', '', $this->allocation['y2021']),
                'y2022'     => str_replace(',', '', $this->allocation['y2022']),
                'y2023'     => str_replace(',', '', $this->allocation['y2023']),
            ],
            'disbursement'          => [
                'y2016'     => str_replace(',', '', $this->disbursement['y2016']),
                'y2017'     => str_replace(',', '', $this->disbursement['y2017']),
                'y2018'     => str_replace(',', '', $this->disbursement['y2018']),
                'y2019'     => str_replace(',', '', $this->disbursement['y2019']),
                'y2020'     => str_replace(',', '', $this->disbursement['y2020']),
                'y2021'     => str_replace(',', '', $this->disbursement['y2021']),
                'y2022'     => str_replace(',', '', $this->disbursement['y2022']),
                'y2023'     => str_replace(',', '', $this->disbursement['y2023']),
            ],
            'total_project_cost' => str_replace(',', '', $this->total_project_cost)
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
//            'code'                              => 'nullable|string',
            'title'                             => 'required|max:255',
            'pap_type_id'                       => 'required|exists:pap_types,id',
            'regular_program'                   => 'required|bool',
            'has_infra'                         => 'required|bool',
            'bases'                             => 'required',
            'description'                       => 'required',
            'expected_outputs'                  => 'required',
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
            'iccable'                           => 'required|bool',
            'approval_level_id'                 => 'required_if:iccable,1|exists:approval_levels,id',
            'approval_date'                     => 'required_with:approval_level_id',
            'gad_id'                            => 'required_if:iccable,1|exists:gads,id',
//            'other_infrastructure'              => 'nullable',
//            'risk'                              => 'required_if:trip,true',
            'pdp_chapter_id'                    => 'required',
            'no_pdp_indicator'                  => 'nullable|bool',
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
            'region_investments.*'                => 'required|array',
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
            'fs_investments.*'                    => 'required|array',
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
            'has_subprojects'                   => 'nullable|bool',
            'ict'                               => 'required|bool',
            'covid'                             => 'required|bool',
            'covid_interventions'               => 'nullable',
            'research'                          => 'required|bool',
        ];
    }
}
