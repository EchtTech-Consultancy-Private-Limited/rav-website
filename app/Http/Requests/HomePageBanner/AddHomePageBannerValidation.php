<?php

namespace App\Http\Requests\HomePageBanner;

use Illuminate\Foundation\Http\FormRequest;

class AddHomePageBannerValidation extends FormRequest
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
            'tabtype'=> 'required',
            'title_name_en'=> 'required',
            'image'=> 'mimes:jpg,jpeg,gif,bmp,png',
        ];
    }
    public function messages()
    {
        return [
            'name_en.unique'=> 'Enter Unique Name.',

        ];
    }
}
