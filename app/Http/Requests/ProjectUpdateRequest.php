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
            //
        ];
    }
}
