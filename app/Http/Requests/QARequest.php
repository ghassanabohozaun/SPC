<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QARequest extends FormRequest
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
            'title_ar' => ['required_if:arabic,on'],
            'details_ar' =>  ['required_if:arabic,on'],
            'title_en' => 'required',
            'details_en' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title_ar.required_if' => __('QA.title_ar_required'),
            'title_en.required' => __('QA.title_en_required'),
            'details_ar.required_if' =>  __('QA.details_ar_required'),
            'details_en.required' =>  __('QA.details_en_required'),
        ];
    }
}
