<?php

namespace App\Http\Requests\PrivateGovtClientLogo;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueTitleNotSoftDeleted;
use Illuminate\Http\Request;

class EditPrivateGovtClientLogoValidation extends FormRequest
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
    public function rules(Request $request)
    {
        $Id = $request->get('id');
        return [
            'question_en'=> 'required|unique:faq,question_en,'.$Id.',uid',
            'question_hi'=> 'required',
            'kt_description_en'=> 'required',
            'kt_description_hi'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            'title_name_en.required'=> 'Enter Unique Question Name.',
            'title_name_en.unique'=> 'Enter Question Name.',
            'question_hi.required'=> 'Enter Hindi Question Name.',
            'kt_description_en.required'=> 'Enter description English.',
            'kt_description_hi.required'=> 'Enter description Hindi.',
        ];
    }
}