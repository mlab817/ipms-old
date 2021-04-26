<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripStoreRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'infrastructure_sectors'                    => ['required','array'],
            'infrastructure_subsectors'                 => ['nullable','array'],
            'other_infrastructure'                      => ['required_if:infrastructure_subsectors.*,in:65'],
            'risk'                                      => ['required','string'],
            'has_row'                                   => ['required','boolean'],
            'right_of_way'                              => ['required_if:has_row,true'],
            'right_of_way.y2017'                        => ['required','gte:0'],
            'right_of_way.y2018'                        => ['required','gte:0'],
            'right_of_way.y2019'                        => ['required','gte:0'],
            'right_of_way.y2020'                        => ['required','gte:0'],
            'right_of_way.y2021'                        => ['required','gte:0'],
            'right_of_way.y2022'                        => ['required','gte:0'],
            'right_of_way.affected_households'          => ['required','gte:0','numeric'],
            'has_rap'                                   => ['required','boolean'],
            'resettlement_action_plan'                  => ['required_if:has_rap,true'],
            'resettlement_action_plan.y2017'            => ['required','gte:0'],
            'resettlement_action_plan.y2018'            => ['required','gte:0'],
            'resettlement_action_plan.y2019'            => ['required','gte:0'],
            'resettlement_action_plan.y2020'            => ['required','gte:0'],
            'resettlement_action_plan.y2021'            => ['required','gte:0'],
            'resettlement_action_plan.y2022'            => ['required','gte:0'],
            'resettlement_action_plan.affected_households'=> ['required','gte:0','numeric'],
            'fs_infrastructures'                        => ['required','array'],
            'fs_infrastructures.*.funding_source_id'    => ['required'],
            'fs_infrastructures.*.y2016'                => ['required','gte:0'],
            'fs_infrastructures.*.y2017'                => ['required','gte:0'],
            'fs_infrastructures.*.y2018'                => ['required','gte:0'],
            'fs_infrastructures.*.y2019'                => ['required','gte:0'],
            'fs_infrastructures.*.y2020'                => ['required','gte:0'],
            'fs_infrastructures.*.y2021'                => ['required','gte:0'],
            'fs_infrastructures.*.y2022'                => ['required','gte:0'],
            'fs_infrastructures.*.y2023'                => ['required','gte:0'],
            'region_infrastructures'                    => ['required','array'],
            'region_infrastructures.*.region_id'        => ['required'],
            'region_infrastructures.*.y2016'            => ['required','gte:0'],
            'region_infrastructures.*.y2017'            => ['required','gte:0'],
            'region_infrastructures.*.y2018'            => ['required','gte:0'],
            'region_infrastructures.*.y2019'            => ['required','gte:0'],
            'region_infrastructures.*.y2020'            => ['required','gte:0'],
            'region_infrastructures.*.y2021'            => ['required','gte:0'],
            'region_infrastructures.*.y2022'            => ['required','gte:0'],
            'region_infrastructures.*.y2023'            => ['required','gte:0'],
        ];
    }

    public function messages()
    {
        return [
            'infrastructure_sectors.required'           => 'Infrastructure sector category is required. Select at least one.',
            'risk.required'                             => 'Implementation risk and mitigation strategy is required.',
            'other_infrastructure.required'             => 'Please specify.'
        ];
    }
}
