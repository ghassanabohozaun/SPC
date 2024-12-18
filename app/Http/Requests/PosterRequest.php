<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PosterRequest extends FormRequest
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

        $rules =  [
            'title_en' =>  'required',
            'title_ar' => 'required_if:site_lang_ar,on',
            'added_date' =>  'required',
            'publisher_name' =>  'required',
            'photo' => 'required_without:hidden_photo|image|mimes:png,jpg,jpeg|max:1024',
            'file' => 'required_without:hidden_file|mimes:pdf|max:10240',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'title_en.required' => __('posters.required'),
            'title_ar.required_if' => __('posters.required'),
            'started_date.required' =>  __('posters.required'),
            'photo.required_without' =>  __('posters.photo_required'),
            'photo.image' =>  __('posters.image'),
            'photo.mimes' =>  __('posters.photo_mimes'),
            'photo.max' =>  __('posters.photo_max'),

            'file.required_without' =>  __('posters.file_required'),
            'file.mimes' => __('posters.file_mimes'),
            'file.max' =>  __('posters.file_max'),


        ];
    }
}
