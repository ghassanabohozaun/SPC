<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideosRequest extends FormRequest
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

        $rules = [
            'title_en' => 'required',
            'title_ar' => 'required_if:site_lang_ar,on',
            'link' => 'required',
            'photo' => 'required_without:hidden_photo|image|mimes:png,jpg,jpeg,gif|max:1024',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => __('videos.required'),
            'required_if' => __('videos.required'),
            'required_without' => __('videos.photo_required'),
            'image' => __('videos.image'),
            'mimes' => __('videos.mimes'),
            'max' => __('videos.image_max'),
        ];
    }
}
