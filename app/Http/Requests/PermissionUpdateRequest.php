<?php

namespace App\Http\Requests;

use App\Models\Permission;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PermissionUpdateRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
            ],
            'guard_name' => [
                'required',
                'in:'. collect(Permission::GUARDS)->implode(','),
                Rule::unique('permissions')->where(function ($query) {
                    return $query
                        ->whereName($this->get('name'))
                        ->whereGuardName($this->get('guard_name'));
                })->ignore($this->get('id'))
            ]
        ];
    }

    public function messages()
    {
        return [
            'guard_name.unique' => "The combination \"{$this->get('name')}\" and \"{$this->get('guard_name')}\" already exists",
        ];
    }
}
