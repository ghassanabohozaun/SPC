<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FixedTextsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        $rules = [
//            'project_details_ar' => 'required',
////            'project_details_en' => 'required',
//            'about_association_title_ar' => 'required',
//            'about_association_title_en' => 'required',
            'about_association_details_ar' => 'required',
            'about_association_details_en' => 'required',
            'about_association_founders_count' => 'required',
            'about_association_beneficiaries_count' => 'required',
//            'founders_title_ar' => 'required',
//            'founders_title_en' => 'required',
//            'blog_title_ar' => 'required',
//            'blog_title_en' => 'required',
//            'testimonials_title_ar' => 'required',
//            'testimonials_title_en' => 'required',
            'testimonials_details_ar' => 'required',
            'testimonials_details_en' => 'required',
//            'counter_icon_1' => 'required',
            'counter_number_1' => 'required',
            'counter_name_1_ar' => 'required',
            'counter_name_1_en' => 'required',
//            'counter_icon_2' => 'required',
            'counter_number_2' => 'required',
            'counter_name_2_ar' => 'required',
            'counter_name_2_en' => 'required',
//            'counter_icon_3' => 'required',
            'counter_number_3' => 'required',
            'counter_name_3_ar' => 'required',
            'counter_name_3_en' => 'required',
//            'counter_icon_4' => 'required',
            'counter_number_4' => 'required',
            'counter_name_4_ar' => 'required',
            'counter_name_4_en' => 'required',

        ];

        return $rules;

    }

    public function messages()
    {
        return [
            'required' => __('fixedTexts.required'),
        ];
    }
}
