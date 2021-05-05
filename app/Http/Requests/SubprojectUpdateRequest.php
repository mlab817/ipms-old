<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubprojectUpdateRequest extends FormRequest
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

    public function prepareForValidation()
    {
        return $this->merge([
            'total_cost' => str_replace(',', '', $this->total_cost),
//            'y2016'             => str_replace(',', '', $this->total_cost),
            'y2017'             => str_replace(',', '', $this->y2017),
            'y2018'             => str_replace(',', '', $this->y2018),
            'y2019'             => str_replace(',', '', $this->y2019),
            'y2020'             => str_replace(',', '', $this->y2020),
            'y2021'             => str_replace(',', '', $this->y2021),
            'y2022'             => str_replace(',', '', $this->y2022),
//            'y2023'             => str_replace(',', '', $this->y2023),
//            'y2024'             => str_replace(',', '', $this->y2024),
//            'y2025'             => str_replace(',', '', $this->y2025),
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
            'title'             => 'required|max:191',
//            'operating_unit_id' => 'required',
            'description'       => 'required',
            'expected_outputs'  => 'required',
            'total_cost'        => 'required|numeric|gte:0',
            'funding_year'      => 'required|in:'. implode(',',config('ipms.editor.years')),
//            'y2016'             => 'required|numeric|gte:0',
            'y2017'             => 'required|numeric|gte:0',
            'y2018'             => 'required|numeric|gte:0',
            'y2019'             => 'required|numeric|gte:0',
            'y2020'             => 'required|numeric|gte:0',
            'y2021'             => 'required|numeric|gte:0',
            'y2022'             => 'required|numeric|gte:0',
//            'y2023'             => 'required|numeric|gte:0',
//            'y2024'             => 'required|numeric|gte:0',
//            'y2025'             => 'required|numeric|gte:0',
        ];
    }
}
