<?php

namespace App\Http\Requests;

use App\Models\Pipol;
use App\Models\Reason;
use Illuminate\Foundation\Http\FormRequest;

class ProjectDropRequest extends FormRequest
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
            'reason_id'     => 'required|exists:reasons,id',
            'other_reason'  => 'nullable|required_if:reason_id,' . Reason::where('name','Other')->first()->id,
        ];
    }
}
