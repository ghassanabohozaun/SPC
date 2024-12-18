<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookRequest extends FormRequest
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

        $route = $this->route()->getName();

        $rules =  [
            'abstract_en' =>  'required',
            'abstract_ar' => 'required_if:site_lang_ar,on',
            'publish_date' =>  'required',
            'publisher_name' =>  'required',
            'photo' => 'required_without:hidden_photo|image|mimes:png,jpg,jpeg|max:1024',
            'file' => 'required_without:hidden_file|mimes:pdf|max:10240',
        ];

        if ($route == 'admin.books.store') {
            $rules['title_en'] = ['required',  Rule::unique('books', 'title_en')->withoutTrashed()];
            $rules['title_ar'] = ['required_if:site_lang_ar,on', Rule::unique('books', 'title_ar')->withoutTrashed()];
        } else {
            $rules['title_en'] = ['required'];
            $rules['title_ar'] = ['required_if:site_lang_ar,on'];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'language.required' => __('books.language_required'),
            'title_ar.unique' => __('books.unique_ar'),
            'title_en.unique' => __('books.unique_en'),
            'title_ar.required' => __('books.title_ar_required'),
            'title_ar.required_if' => __('books.title_ar_required'),
            'title_en.required' => __('books.title_en_required'),
            'abstract_en.required' => __('books.abstract_en_required'),
            'abstract_ar.required_if' => __('books.abstract_ar_required'),
            'abstract_ar.required' => __('books.abstract_ar_required'),
            'publish_date.required' => __('books.publish_date_required'),
            'publish_name..required' => __('books.publish_name_required'),
            'in' => __('books.in'),
            'numeric' => __('books.numeric'),
            'image' => __('books.image'),
            'photo.mimes' => __('books.photo_mimes'),
            'photo.max' => __('books.photo_max'),
            'photo.required_without' => __('books.photo_required'),
            'file.mimes' => __('books.file_mimes'),
            'file.max' => __('books.file_max'),
            'file.required_without' => __('books.file_required'),
        ];
    }
}
