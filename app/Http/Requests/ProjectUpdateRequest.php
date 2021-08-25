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
        if ($this->has('pap_type_id')) {
            $this->merge([
                'regular_program' => ($this->pap_type_id == 2 ? false : $this->regular_program ),
                'has_subprojects' => $this->pap_type_id == 1,
            ]);
        }

        if ($this->has('feasibility_study')) {
            $this->merge([
                'feasibility_study' => [
                    'fs_status_id'      => $this->feasibility_study['fs_status_id'] ?? null,
                    'needs_assistance'  => $this->feasibility_study['needs_assistance'],
//                'y2016'     => toFloat($this->feasibility_study['y2016']),
                    'y2017'     => toFloat($this->feasibility_study['y2017']),
                    'y2018'     => toFloat($this->feasibility_study['y2018']),
                    'y2019'     => toFloat($this->feasibility_study['y2019']),
                    'y2020'     => toFloat($this->feasibility_study['y2020']),
                    'y2021'     => toFloat($this->feasibility_study['y2021']),
                    'y2022'     => toFloat($this->feasibility_study['y2022']),
//                'y2023'     => toFloat($this->feasibility_study['y2023']),
                    'completion_date'  => $this->feasibility_study['completion_date'],
                ]
            ]);
        }

        if ($this->has('region_investments')) {
            $this->merge([
                'region_investments'    => collect($this->region_investments)->map(function($ri) {
                    return [
                        'region_id' => $ri['region_id'],
                        'y2016'     => toFloat($ri['y2016']),
                        'y2017'     => toFloat($ri['y2017']),
                        'y2018'     => toFloat($ri['y2018']),
                        'y2019'     => toFloat($ri['y2019']),
                        'y2020'     => toFloat($ri['y2020']),
                        'y2021'     => toFloat($ri['y2021']),
                        'y2022'     => toFloat($ri['y2022']),
                        'y2023'     => toFloat($ri['y2023']),
                    ];
                })
            ]);
        }

        if ($this->has('fs_investments')) {
            $this->merge([
                'fs_investments'        => collect($this->fs_investments)->map(function($fi) {
                    return [
                        'fs_id'     => $fi['fs_id'],
                        'y2016'     => toFloat($fi['y2016']),
                        'y2017'     => toFloat($fi['y2017']),
                        'y2018'     => toFloat($fi['y2018']),
                        'y2019'     => toFloat($fi['y2019']),
                        'y2020'     => toFloat($fi['y2020']),
                        'y2021'     => toFloat($fi['y2021']),
                        'y2022'     => toFloat($fi['y2022']),
                        'y2023'     => toFloat($fi['y2023']),
                    ];
                })
            ]);
        }

        if ($this->has('nep')) {
            $this->merge([
                'nep'                   => [
                    'y2016'     => toFloat($this->nep['y2016']),
                    'y2017'     => toFloat($this->nep['y2017']),
                    'y2018'     => toFloat($this->nep['y2018']),
                    'y2019'     => toFloat($this->nep['y2019']),
                    'y2020'     => toFloat($this->nep['y2020']),
                    'y2021'     => toFloat($this->nep['y2021']),
                    'y2022'     => toFloat($this->nep['y2022']),
                    'y2023'     => toFloat($this->nep['y2023']),
                ]
            ]);
        }

        if ($this->has('allocation')) {
            $this->merge([
                'allocation'            => [
                    'y2016'     => toFloat($this->allocation['y2016']),
                    'y2017'     => toFloat($this->allocation['y2017']),
                    'y2018'     => toFloat($this->allocation['y2018']),
                    'y2019'     => toFloat($this->allocation['y2019']),
                    'y2020'     => toFloat($this->allocation['y2020']),
                    'y2021'     => toFloat($this->allocation['y2021']),
                    'y2022'     => toFloat($this->allocation['y2022']),
                    'y2023'     => toFloat($this->allocation['y2023']),
                ]
            ]);
        }

        if ($this->has('disbursement')) {
            $this->merge([
                'disbursement'          => [
                    'y2016'     => toFloat($this->disbursement['y2016']),
                    'y2017'     => toFloat($this->disbursement['y2017']),
                    'y2018'     => toFloat($this->disbursement['y2018']),
                    'y2019'     => toFloat($this->disbursement['y2019']),
                    'y2020'     => toFloat($this->disbursement['y2020']),
                    'y2021'     => toFloat($this->disbursement['y2021']),
                    'y2022'     => toFloat($this->disbursement['y2022']),
                    'y2023'     => toFloat($this->disbursement['y2023']),
                ]
            ]);
        }


        if ($this->has('total_project_cost')) {
            $this->merge([
                'total_project_cost' => toFloat($this->total_project_cost)
            ]);
        }

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'office_id'                         => 'sometimes|required|exists:offices,id',
            'title'                             => 'sometimes|required|max:255',
            'pap_type_id'                       => 'sometimes|required|exists:pap_types,id',
            'regular_program'                   => 'sometimes|required|bool',
            'has_infra'                         => 'sometimes|required|bool',
            'has_subprojects'                   => 'sometimes|nullable|bool',
            'bases'                             => 'sometimes|required',
            'description'                       => 'sometimes|required',
            'expected_outputs'                  => 'sometimes|required',
            'total_project_cost'                => 'sometimes|required|numeric|gte:1',
            'project_status_id'                 => 'sometimes|required|exists:project_statuses,id',
            'operating_units'                   => 'sometimes|required',
            'operating_units.*'                 => 'sometimes|exists:operating_units,id',
            'research'                          => 'sometimes|required|bool',
            'ict'                               => 'sometimes|required|bool',
            'covid'                             => 'sometimes|required|bool',
            'covid_interventions'               => 'sometimes|nullable',
            'spatial_coverage_id'               => 'sometimes|required|exists:spatial_coverages,id',
            'regions'                           => 'sometimes|required',
            'regions.*'                         => 'exists:regions,id',
            'iccable'                           => 'sometimes|required|bool',
            'approval_level_id'                 => 'sometimes|required_if:iccable,1|exists:approval_levels,id',
            'approval_date'                     => 'sometimes|required_if:iccable,1',
            'gad_id'                            => 'sometimes|required_if:iccable,1|exists:gads,id',
            'rdip'                              => 'sometimes|required|bool',
            'rdc_endorsement_required'          => 'sometimes|required_if:rdip,true|bool',
            'rdc_endorsed'                      => 'sometimes|required_if:rdc_endorsement_required,true|bool',
            'rdc_endorsed_date'                 => 'sometimes|nullable|required_if:rdc_endorsed,1|date',
            'preparation_document_id'           => 'sometimes|required',
            'pdp_chapter_id'                    => 'sometimes|required',
            'no_pdp_indicator'                  => 'sometimes|nullable|bool',
            'target_start_year'                 => 'sometimes|required|int|min:2000',
            'target_end_year'                   => 'sometimes|required|int|gte:target_start_year',
            'has_fs'                            => 'sometimes|required|bool',
            'feasibility_study'                 => 'sometimes|required',
            'feasibility_study.fs_status_id'    => 'sometimes|nullable|required_if:has_fs,1|exists:fs_statuses,id',
            'feasibility_study.needs_assistance'=> 'sometimes|bool',
//            'feasibility_study.y2016'           => 'numeric|min:0',
            'feasibility_study.y2017'           => 'sometimes|numeric|min:0',
            'feasibility_study.y2018'           => 'sometimes|numeric|min:0',
            'feasibility_study.y2019'           => 'sometimes|numeric|min:0',
            'feasibility_study.y2020'           => 'sometimes|numeric|min:0',
            'feasibility_study.y2021'           => 'sometimes|numeric|min:0',
            'feasibility_study.y2022'           => 'sometimes|numeric|min:0',
//            'feasibility_study.y2023'           => 'numeric|min:0',
//            'feasibility_study.y2024'           => 'numeric|min:0',
//            'feasibility_study.y2025'           => 'numeric|min:0',
            'employment_generated'              => 'sometimes|nullable|string',
            'funding_source_id'                 => 'sometimes|required|exists:funding_sources,id',
            'implementation_mode_id'            => 'sometimes|required|exists:implementation_modes,id',
            'other_fs'                          => 'sometimes|nullable',
            'updates'                           => 'sometimes|required',
            'updates_date'                      => 'sometimes|required|date',
            'tier_id'                           => 'sometimes|required|exists:tiers,id',
            'uacs_code'                         => 'sometimes|nullable|required_if:tier_id,1',
            'funding_sources'                   => 'sometimes|required|exists:funding_sources,id',
            'funding_institution_id'            => 'sometimes|exclude_unless:funding_source_id,2|exists:funding_institutions,id',
            'pdp_chapters'                      => 'sometimes|required',
            'prerequisites'                     => 'sometimes|nullable|array',
            'sdgs'                              => 'sometimes|nullable|array',
            'sdgs.*'                            => 'sometimes|exists:sdgs,id',
            'pdp_indicators'                    => 'sometimes|nullable|array',
            'pdp_indicators.*'                  => 'sometimes|exists:pdp_indicators,id',
            'ten_point_agendas'                 => 'sometimes|nullable|array',
            'ten_point_agendas.*'               => 'sometimes|exists:ten_point_agendas,id',
            'nep.*'                             => 'sometimes|required_if:project_status_id,2',
            'nep.y2016'                         => 'sometimes|numeric|min:0',
            'nep.y2017'                         => 'sometimes|numeric|min:0',
            'nep.y2018'                         => 'sometimes|numeric|min:0',
            'nep.y2019'                         => 'sometimes|numeric|min:0',
            'nep.y2020'                         => 'sometimes|numeric|min:0',
            'nep.y2021'                         => 'sometimes|numeric|min:0',
//            'nep.y2022'                         => 'numeric|min:0',
//            'nep.y2023'                         => 'numeric|min:0',
//            'nep.y2024'                         => 'numeric|min:0',
//            'nep.y2025'                         => 'numeric|min:0',
            'allocation.*'                        => 'sometimes|required_if:project_status_id,2',
            'allocation.y2016'                  => 'sometimes|numeric|min:0',
            'allocation.y2017'                  => 'sometimes|numeric|min:0',
            'allocation.y2018'                  => 'sometimes|numeric|min:0',
            'allocation.y2019'                  => 'sometimes|numeric|min:0',
            'allocation.y2020'                  => 'sometimes|numeric|min:0',
            'allocation.y2021'                  => 'sometimes|numeric|min:0',
//            'allocation.y2022'                  => 'numeric|lte:nep.y2022|min:0',
//            'allocation.y2023'                  => 'numeric|lte:nep.y2023|min:0',
//            'allocation.y2024'                  => 'numeric|lte:nep.y2024|min:0',
//            'allocation.y2025'                  => 'numeric|lte:nep.y2025|min:0',
            'disbursement.*'                    => 'sometimes|required_if:project_status_id,2',
            'disbursement.y2016'                => 'sometimes|numeric|min:0',
            'disbursement.y2017'                => 'sometimes|numeric|min:0',
            'disbursement.y2018'                => 'sometimes|numeric|min:0',
            'disbursement.y2019'                => 'sometimes|numeric|min:0',
            'disbursement.y2020'                => 'sometimes|numeric|min:0',
            'disbursement.y2021'                => 'sometimes|numeric|min:0',
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
//            'region_investments'                => 'required|array',
            'region_investments.*.region_id'    => 'sometimes|required|exists:regions,id',
            'region_investments.*.y2016'        => 'sometimes|required|min:0|numeric',
            'region_investments.*.y2017'        => 'sometimes|required|min:0|numeric',
            'region_investments.*.y2018'        => 'sometimes|required|min:0|numeric',
            'region_investments.*.y2019'        => 'sometimes|required|min:0|numeric',
            'region_investments.*.y2020'        => 'sometimes|required|min:0|numeric',
            'region_investments.*.y2021'        => 'sometimes|required|min:0|numeric',
            'region_investments.*.y2022'        => 'sometimes|required|min:0|numeric',
            'region_investments.*.y2023'        => 'sometimes|required|min:0|numeric',
//            'region_investments.*.y2024'        => 'required|min:0:numeric',
//            'region_investments.*.y2025'        => 'required|min:0:numeric',
//            'fs_investments'                    => 'required|array',
            'fs_investments.*.fs_id'            => 'sometimes|required|exists:funding_sources,id',
            'fs_investments.*.y2016'            => 'sometimes|required|min:0|numeric',
            'fs_investments.*.y2017'            => 'sometimes|required|min:0|numeric',
            'fs_investments.*.y2018'            => 'sometimes|required|min:0|numeric',
            'fs_investments.*.y2019'            => 'sometimes|required|min:0|numeric',
            'fs_investments.*.y2020'            => 'sometimes|required|min:0|numeric',
            'fs_investments.*.y2021'            => 'sometimes|required|min:0|numeric',
            'fs_investments.*.y2022'            => 'sometimes|required|min:0|numeric',
            'fs_investments.*.y2023'            => 'sometimes|required|min:0|numeric',
//            'fs_investments.*.y2024'            => 'required|min:0:numeric',
//            'fs_investments.*.y2025'            => 'required|min:0:numeric',
        ];
    }

    public function messages()
    {
        return [
            'funding_sources.required'      => 'Please select at least one.',
            'pdp_chapters.required'         => 'Please select at least one.',
            'operating_units.required'      => 'Please select at least one.',
            'rdc_endorsed_date.required_if' => 'Please indicate endorsement date if the PAP has been endorsed by RDC.',
            'uacs_code.required_if'         => 'UACS Code is required if the PAP is ongoing.',
        ];
    }
}
