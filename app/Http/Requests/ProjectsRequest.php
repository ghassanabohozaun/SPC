<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectsRequest extends FormRequest
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
            'file' => ['mimes:pdf'],
            'word' => 'mimes:doc,pdf,docx,zip',
            'date' => 'required',
            'title_ar' => 'required',
            'title_en' => ['required_if:english,on'],
            'details_ar' => 'required',
            'details_en' => ['required_if:english,on'],

        ];
    }

    public function messages()
    {
        return [
            'photo.required_without' => __('projects.photo_required'),
            'title_ar.required' => __('projects.title_ar_required'),
            'title_en.required_if' => __('projects.title_en_required'),
            'details_ar.required' => __('projects.details_ar_required'),
            'details_en.required_if' => __('projects.details_en_required'),
            'date.required' => __('projects.date_required'),
            'writer.required' => __('projects.writer_required'),
            'file.mimes' => __('projects.file_pdf'),
            'word.mimes' => __('projects.file_word'),
        ];
    }
}
