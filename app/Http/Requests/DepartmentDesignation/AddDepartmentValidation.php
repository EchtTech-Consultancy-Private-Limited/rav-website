<?php

namespace App\Http\Requests\DepartmentDesignation;

use Illuminate\Foundation\Http\FormRequest;

class AddDepartmentValidation extends FormRequest
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
            'name_en'=> 'required|email',
        ];
    }
    public function messages()
    {
        return [
            'name_en.unique'=> 'Enter Unique Name.',

        ];
    }
}
