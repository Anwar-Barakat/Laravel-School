<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionRequest extends FormRequest
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
            'name_ar'       => 'required|min:1',
            'name_en'       => 'required|min:1',
            'grade_id'      => 'required|numeric',
            'classroom_id'  => 'required|numeric',
        ];
    }
}
