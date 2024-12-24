<?php

namespace App\Http\Requests\Tests;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
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
            'test_name' =>  'required',
            'test_details' => 'required',
            'added_date' =>  'required',
            'test_photo' => 'required_without:hidden_photo|image|mimes:png,jpg,jpeg|max:1024',
            'file' => 'required_without:hidden_file|mimes:pdf|max:10240',
        ];

        return $rules;
    }


    public function messages()
    {
        return [
            'test_name.required' => __('tests.required'),
            'test_details.required' =>  __('tests.required'),
            'added_date.required' =>  __('tests.required'),
            'test_photo.required_without' =>  __('tests.photo_required'),
            'test_photo.image' =>  __('tests.image'),
            'test_photo.mimes' =>  __('tests.photo_mimes'),
            'test_photo.max' =>  __('tests.photo_max'),
            'file.required_without' =>  __('tests.file_required'),
            'file.mimes' => __('tests.file_mimes'),
            'file.max' =>  __('tests.file_max'),
        ];
    }
}
