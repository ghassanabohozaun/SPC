<?php

namespace App\Http\Requests\Tests;

use Illuminate\Foundation\Http\FormRequest;

class ScaleRequest extends FormRequest
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
            'statement' => 'required',
            'evaluation' => 'required',
            'minimum' => 'required|numeric',
            'maximum' => 'required|numeric',
            'photo' => 'sometimes|nullable|image|mimes:jpg,jpeg,png|max:2024'
        ];
    }

    public function messages()
    {
        return [
            'statement.required' => __('tests.required'),
            'evaluation.required' => __('tests.required'),
            'minimum.required' => __('tests.required'),
            'maximum.required' => __('tests.required'),
            'photo.image' => __('tests.image'),
            'photo.mimes' => __('tests.mimes'),
            'photo.max' => __('tests.mimmaxes'),
        ];


    }
}
