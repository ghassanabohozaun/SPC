<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FAQRequest extends FormRequest
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
            'question_en' =>  ['required'],
            'answer_en' =>  ['required'],
            'question_ar' => ['required_if:site_lang_ar,on'],
            'answer_ar' => ['required_if:site_lang_ar,on'],
        ];
    }

    public function messages()
    {
        return [
            'question_en.requied' => __('faqs.quetoin_en_required'),
            'question_ar.required_if' => __('faqs.question_ar_required'),
            'answer_en.requied' =>  __('faqs.answer_en_required'),
            'answer_ar.required_if' =>  __('faqs.answer_ar_required'),
        ];
    }
}
