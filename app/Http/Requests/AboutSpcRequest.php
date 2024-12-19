<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutSpcRequest extends FormRequest
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
            'title_en' => 'required',
            'title_ar' => 'required_if:site_lang_ar,on',
            'details_en' => 'required',
            'details_ar' => 'required_if:site_lang_ar,on',
        ];
    }

    public function messages()
    {
        return [

            'title_en.required' => __('aboutSpcs.title_en_required'),
            'details_en.required' => __('aboutSpcs.details_en_required'),

            'title_ar.required_if' => __('aboutSpcs.title_ar_required'),
            'details_ar.required_if' => __('aboutSpcs.details_ar_required'),

        ];
    }
}
