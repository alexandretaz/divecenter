<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
            'begins'=>'required',
            'ends'=>'required',
            'eventable_type'=>"required",
            'eventable_id'=>"required",
            'description'=>"required",
            'cost'=>"required",
            'price'=>"required",

            //
        ];
    }
}
