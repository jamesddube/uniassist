<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateSubjectRequest extends Request
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

            'subject_code' => 'required|min:3',
            'subject_name' => 'required|min:4',
            'subject_category' => 'required'
        ];
    }
}
