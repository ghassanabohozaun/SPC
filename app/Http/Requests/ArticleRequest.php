<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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

        if (setting()->site_lang_en == 'on') {
            $rules = [
                'abstract_ar' => 'required',
                'abstract_en' => 'required',
                'publish_date' => 'required',
                'photo' => 'required_without:hidden_photo|image|mimes:jpeg,jpg,png|max:1024',
            ];

            if($route == 'admin.articles.store'){
                $rules['title_ar'] = ['required','unique:articles'];
                $rules['title_en'] = ['required','unique:articles'];
            }

        } else {
            $rules = [
                'abstract_ar' => 'required',
                'publish_date' => 'required',
                'publisher_name' => 'required',
            ];

            if($route == 'admin.articles.store'){
                $rules['title_ar'] = ['required','unique:articles'];
                $rules['title_en'] = ['required','unique:articles'];
            }

        }

        return $rules;

    }

     public function messages()
     {
         return [
             'language.required' => __('articles.language_required'),
             'title_ar.required' => __('articles.title_ar_required'),
             'title_en.required' => __('articles.title_en_required'),
             'abstract_ar.required' => __('articles.abstract_ar_required'),
             'abstract_en.required' => __('articles.abstract_en_required'),
             'publish_date.required' => __('articles.publish_date_required'),
             'publisher_name.required' => __('articles.publisher_name_required'),
             'in' => __('articles.in'),
             'numeric' => __('articles.numeric'),
             'image' => __('articles.image'),
             'title_ar.unique' => __('articles.unique_ar'),
             'title_en.unique' => __('articles.unique_en'),
             'mimes' => __('articles.mimes'),
             'max' => __('articles.image_max'),
             'photo.required_without' => __('articles.photo_required'),
         ];
     }
}
