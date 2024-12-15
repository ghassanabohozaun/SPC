<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PublicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        $route = $this->route()->getName();


        $rules = [
            'details_en' => 'required',
            'details_ar' => 'required_if:site_lang_ar,on',
            'added_date' => 'required|date',
            'photo' => 'required_without:hidden_photo|image|mimes:jpeg,jpg,png|max:1024',
        ];


        if ($route == 'admin.publications.store') {
            $rules['title_en'] = ['required',  Rule::unique('publications', 'title_en')->withoutTrashed()];
            $rules['title_ar'] = ['required_if:site_lang_ar,on', Rule::unique('publications', 'title_ar')->withoutTrashed()];
        } else {
            $rules['title_en'] = ['required'];
            $rules['title_ar'] = ['required_if:site_lang_ar,on'];
        }


        return $rules;
    }

    public function messages()
    {
        return [
            'language.required' => __('publications.language_required'),
            'title_ar.required' => __('publications.title_ar_required'),
            'title_ar.required_if' => __('publications.title_ar_required'),
            'title_en.required' => __('publications.title_en_required'),
            'details_ar.required' => __('publications.details_ar_required'),
            'details_ar.required_if' => __('publications.details_ar_required'),
            'details_en.required' => __('publications.details_en_required'),
            'publish_date.required' => __('publications.added_date_required'),
            'in' => __('publications.in'),
            'numeric' => __('publications.numeric'),
            'image' => __('publications.image'),
            'title_ar.unique' => __('publications.unique_ar'),
            'title_en.unique' => __('publications.unique_en'),
            'mimes' => __('publications.mimes'),
            'max' => __('publications.image_max'),
            'photo.required_without' => __('publications.photo_required'),
        ];
    }
}
