<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectStoreRequest extends FormRequest
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
            'title'                             => [
                'required',
                'max:255',
                Rule::unique('projects')->where(function ($query) {
                    return $query
                        ->where('title', $this->title)
                        ->where('created_by', auth()->id())
                        ->whereNull('deleted_at');
                })
            ],
            'pap_type_id'                       => 'required|exists:pap_types,id',
        ];
    }

    public function messages()
    {
        return [
            'title.unique'                  => 'You already have a program/project with the same title.',
            'title.max'                     => 'Please enter maximum of 255 characters.',
            'pap_type_id.required'          => 'Please check whether it is a program or project',
            'pap_type_id.exists'            => 'Please select from the list.',
        ];
    }
}
