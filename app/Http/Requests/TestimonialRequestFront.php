<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequestFront extends FormRequest
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
            'opinion_en' => 'required',
            'opinion_ar' => 'required_if:site_lang_ar,on',
            'name_en' => 'required',
            'name_ar' => 'required_if:site_lang_ar,on',
            'age' => 'required',
            //'country' => 'required',
            'gender' => 'required',
            'rating' => 'required',
            'photo' => 'sometimes|image|mimes:jpeg,jpg,png|max:1024',
            'captcha' => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'required' => __('testimonials.required'),
            'required_if' => __('testimonials.required'),
            'in' => __('testimonials.in'),
            'image' => __('testimonials.image'),
            'mimes' => __('testimonials.mimes'),
            'max' => __('testimonials.image_max'),
            'captcha'=>trans('general.captcha'),
        ];
    }
}
