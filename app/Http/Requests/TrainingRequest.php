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


        $rules =  [
            'title_en' =>  'required',
            'title_ar' => 'required_if:site_lang_ar,on',
            'started_date' =>  'required',
            'photo' => 'required_without:hidden_photo',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'title_en.required' => __('trainings.required'),
            'title_ar.required_if' => __('trainings.required'),
            'started_date.required' =>  __('trainings.required'),
            'photo.required_without' =>  __('trainings.photo_required'),
        ];
    }
}
