<?php

namespace App\Http\Requests\Tests;

use Illuminate\Foundation\Http\FormRequest;

class AnswerRequest extends FormRequest
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
            'answer_text' => 'required',
            'answer_value' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'answer_text.required' => __('tests.required'),
            'answer_value.required' => __('tests.required'),
            'answer_value.numeric' => __('tests.numeric'),
        ];
    }
}
