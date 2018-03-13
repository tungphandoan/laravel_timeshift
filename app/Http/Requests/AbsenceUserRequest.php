<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbsenceUserRequest extends FormRequest
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
            "type" => "required",
            "day" => "required|date",
            "start_time" => "required|date",
            "end_time" => "required|date",
            "content" => "required",
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            "day.required" => "The date has rerequired",
            "start_time.required" => "The Start time has rerequired",
            "end_time.required" => "The End time has rerequired",
            "content.required" => "The Content has rerequired",
            "type.required" => "The type has required",
        ];
    }
}
