<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewRequest extends FormRequest
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

        if ($route == 'admin.news.store') {
            $rules['title_en'] = ['required',  Rule::unique('my_news', 'title_en')->withoutTrashed()];
            $rules['title_ar'] = ['required_if:site_lang_ar,on', Rule::unique('my_news', 'title_ar')->withoutTrashed()];
        } else {
            $rules['title_en'] = ['required'];
            $rules['title_ar'] = ['required_if:site_lang_ar,on'];
        }


        return $rules;
    }

    public function messages()
    {
        return [
            'language.required' => __('news.language_required'),
            'title_ar.required' => __('news.title_ar_required'),
            'title_ar.required_if' => __('news.title_ar_required'),
            'title_en.required' => __('news.title_en_required'),
            'details_ar.required' => __('news.details_ar_required'),
            'details_ar.required_if' => __('news.details_ar_required'),
            'details_en.required' => __('news.details_en_required'),
            'publish_date.required' => __('news.added_date_required'),
            'in' => __('news.in'),
            'numeric' => __('news.numeric'),
            'image' => __('news.image'),
            'title_ar.unique' => __('news.unique_ar'),
            'title_en.unique' => __('news.unique_en'),
            'mimes' => __('news.mimes'),
            'max' => __('news.image_max'),
            'photo.required_without' => __('news.photo_required'),
        ];
    }
}
