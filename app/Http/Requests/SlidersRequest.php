<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlidersRequest extends FormRequest
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
                'photo' => 'required_without:hidden_photo|image|mimes:jpeg,jpg,png|max:1024',
                'title_ar' => 'required',
                'title_en' => 'required',
                'details_ar' => 'required',
                'details_en' => 'required',
                'order' => 'required|numeric',
            ];
        } else {
            return [
                'photo' => 'required_without:hidden_photo|image|mimes:jpeg,jpg,png|max:1024',
                'title_ar' => 'required',
                'details_ar' => 'required',
                'order' => 'sometimes|numeric',
            ];
        }
    }

    public function messages()
    {
        return [
            'required' => __('sliders.required'),
            'in' => __('sliders.in'),
            'numeric' => __('sliders.numeric'),
            'image' => __('sliders.image'),
            'unique' => __('sliders.unique'),
            'mimes' => __('sliders.mimes'),
            'max' => __('sliders.image_max'),
            'photo.required_without' => __('sliders.photo_required'),
        ];
    }
}
