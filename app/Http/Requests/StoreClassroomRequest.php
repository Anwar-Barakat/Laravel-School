<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassroomRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'classrooms_list.*.name_ar'       => 'required|min:3|regex:/^[\pL\s\-]+$/u',
            'classrooms_list.*.name_en'       => 'required|min:3|regex:/^[\pL\s\-]+$/u',
            'classrooms_list.*.grade_id'      => 'required|numeric',
        ];
    }
}