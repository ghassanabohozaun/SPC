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

        if (setting()->site_lang_en == 'on') {
            return [
                'title_ar' => 'required',
                'title_en' => 'required',
                'link' => 'required',
                'photo'=>'sometimes|nullable|image|mimes:jpg,jpeg,png|max:1024',
            ];
        } else {
            return [
                'title_ar' => 'required',
                'link' => 'required',
                'photo'=>'sometimes|nullable|image|mimes:jpg,jpeg,png|max:1024',
            ];
        }
    }

    public function messages()
    {
        return [
            'required' => __('videos.required'),
            'in' => __('videos.in'),
            'image' => __('videos.image'),
            'mimes' => __('videos.mimes'),
            'max' => __('videos.image_max'),
        ];
    }
}
