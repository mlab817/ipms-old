<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectUserStoreRequest extends FormRequest
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
            'user_id'   => [
                'required',
                'exists:users,id',
//                'unique:project_user_permission,user_id,NULL,id,project_id,1'
            ],
            'read'      => 'nullable|bool',
            'update'    => 'nullable|bool',
            'delete'    => 'nullable|bool',
            'review'    => 'nullable|bool',
            'comment'   => 'nullable|bool',
        ];
    }

    public function messages()
    {
        return [
            'user_id.unique' => 'A similar record already exist for this user. Please update that instead.',
        ];
    }
}
