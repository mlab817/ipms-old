<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectUserUpdateRequest extends FormRequest
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
            'read'      => 'nullable|bool',
            'update'    => 'nullable|bool',
            'delete'    => 'nullable|bool',
            'review'    => 'nullable|bool',
            'comment'   => 'nullable|bool',
        ];
    }
}
