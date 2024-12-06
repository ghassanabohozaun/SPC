<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingRequest extends FormRequest
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
            'title_en' =>  ['required'],
            'title_ar' => ['required_if:site_lang,on'],
            'started_date' =>  ['required'],
            'photo' => ['required_without:hidden_photo'],
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'question_en.requied' => __('faqs.quetoin_en_required'),
    //         'question_ar.required_if' => __('faqs.question_ar_required'),
    //         'answer_en.requied' =>  __('faqs.answer_en_required'),
    //         'answer_ar.required_if' =>  __('faqs.answer_ar_required'),
    //     ];
    // }
}
