<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicationsRequest extends FormRequest
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
                    'photo' => 'required_without:hidden_photo|image|mimes:jpeg,jpg,png|max:1024',
                    'title_ar' => 'required',
                    'title_en' => 'required_if:english,on',
//                    'details_ar' => 'required',
//                    'details_en' => 'required_if:english,on',
                    'date' => 'required',
                    // 'writer' => 'required',
                    'file'   => ['mimes:pdf']
                ];


    }

    public function messages()
    {
        return [
            'photo.required_without' => __('publications.photo_required') ,
            'title_ar.required' =>__('publications.title_ar_required'),
            'title_en.required_if' =>__('publications.title_en_required'),
            'details_ar.required' =>__('publications.details_ar_required'),
            'details_en.required_if' =>__('publications.details_en_required'),
            'date.required' =>__('publications.date_required'),
            'writer.required' =>__('publications.writer_required'),
            'file.mimes' =>__('publications.file_mimes'),
        ];
    }
}
