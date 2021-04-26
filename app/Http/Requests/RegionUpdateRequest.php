<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegionUpdateRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name'      => 'required|string|unique:regions,name,' . $this->get('id'),
            'label'     => 'required|string|unique:regions,label,' . $this->get('id'),
            'order'     => 'required|integer|unique:regions,order,' . $this->get('id'),
        ];
    }
}
