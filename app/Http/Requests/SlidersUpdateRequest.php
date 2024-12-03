<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlidersUpdateRequest extends FormRequest
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

        if ($this->input('button_status') == 'show') {

            if (setting()->site_lang_en == 'on') {
                return [
                    'title_ar' => 'required',
                    'title_en' => 'required',
                    'details_ar' => 'required',
                    'details_en' => 'required',
                    'photo' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:5120',
                ];
            } else {
                return [
                    'title_ar' => 'required',
                    'details_ar' => 'required',
                    'photo' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:5120',
                ];
            }
        }else{
            if (setting()->site_lang_en == 'on') {
                return [
                    'title_ar' => 'required',
                    'title_en' => 'required',
                    'details_ar' => 'required',
                    'details_en' => 'required',
                    'photo' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:5120',
                ];
            } else{
                return [
                    'title_ar' => 'required',
                    'details_ar' => 'required',
                    'photo' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:5120',
                ];
            }
        }


    }

    public function messages()
    {
        return [
            'required' => __('sliders.required'),
            'in' => __('sliders.in'),
            'numeric' => __('sliders.numeric'),
            'image' => __('sliders.image'),
            'unique'=>__('sliders.unique'),
            'mimes'=>__('sliders.mimes'),
            'max'=>__('sliders.image_max'),
            'photo.required' => __('sliders.photo_required'),
        ];
    }
}
