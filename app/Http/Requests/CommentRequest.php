<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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


        $rules = [
            'person_name' => 'required',
            'person_email' => 'required',
            'commentary' => 'required',
//            'gender' => 'required|in:male,female,others',
            'photo' => 'sometimes|image|mimes:jpeg,jpg,png|max:1024',
        ];

        return $rules;

    }

    public function messages()
    {
        return [

            'required' => __('articles.required'),
            'in' => __('articles.in'),
            'numeric' => __('articles.numeric'),
            'image' => __('articles.image'),
            'mimes' => __('articles.mimes'),
            'max' => __('articles.image_max'),
        ];
    }
}
