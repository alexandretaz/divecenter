<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseRequest extends FormRequest
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
            'course'=>'required|min:8|unique:courses',
            'level'=>['required', Rule::in(\App\Course::getAllLevels())],
            'cost'=>"required|numeric|min:0",
            'price'=>"required|numeric|min:0",
            'description'=>"required",
            //
        ];
    }
}
