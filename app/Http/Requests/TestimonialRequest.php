<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
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

        if (setting()->site_lang_en == 'on') {
            return [
                'photo' => 'sometimes|image|mimes:jpeg,jpg,png|max:1024',
                'opinion_ar' => 'required',
                'opinion_en' => 'required',
                'name_ar' => 'required',
                'name_en' => 'required',
                'age' => 'required',
//                'country' => 'required',
                'gender' => 'required',
                'rating' => 'required',
            ];
        } else {
            return [
                'photo' => 'sometimes|image|mimes:jpeg,jpg,png|max:1024',
                'opinion_ar' => 'required',
                'name_ar' => 'required',
                'age' => 'required',
//                'country' => 'required',
                'gender' => 'required',
                'rating' => 'required',
            ];
        }

    }

    public function messages()
    {
        return [
            'required' => __('testimonials.required'),
            'in' => __('testimonials.in'),
            'image' => __('testimonials.image'),
            'mimes' => __('testimonials.mimes'),
            'max' => __('testimonials.image_max'),
            'photo.required_without' => __('testimonials.photo_required'),
        ];
    }
}
