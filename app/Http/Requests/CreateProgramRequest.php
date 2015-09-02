<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateProgramRequest extends Request
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

            'program_code' => 'required',
            'program_category' => 'required',
            'program_min_points' => 'required',
            'program_name' => 'required'
        ];
    }
}
