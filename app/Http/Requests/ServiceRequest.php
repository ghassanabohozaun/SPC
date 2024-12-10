<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'summary_en' => 'required',
            'details_en' => 'required',
            'title_ar' => 'required_if:site_lang_ar,on',
            'summary_ar' => 'required_if:site_lang_ar,on',
            'details_ar' => 'required_if:site_lang_ar,on',
            'photo' => 'required_without:hidden_photo|image|mimes:png,jpg,jpeg|max:1024',
        ];
    }

    public function messages()
    {
        return [

            'title_en.required' => __('services.title_en_required'),
            'summary_en.required' => __('services.summary_en_required'),
            'details_en.required' => __('services.details_en_required'),

            'title_ar.required_if' => __('services.title_ar_required'),
            'summary_ar.required_if' => __('services.summary_ar_required'),
            'details_ar.required_if' => __('services.details_ar_required'),


        ];
    }
}
