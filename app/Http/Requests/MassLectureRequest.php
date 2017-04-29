<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MassLectureRequest extends Request
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
            'starting_date' => 'required',
            'starting_time' => 'required',
            'frequency' => 'required',
            'lectures' => 'required|max:2'
        ];
    }
}
