<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutsRequest extends FormRequest
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
                'photo' => 'image|mimes:jpeg,jpg,png|max:1024',
                'title_ar' => 'required',
                'title_en' =>'required_if:english,on',
//                'details_ar' => 'required',
//                'details_en' => 'required_if:english,on',
                'type_id' =>['required','exists:about_types,id']
            ];

    }

    public function messages()
    {
        return [
            'photo.mimes' => __('abouts.photo_mimes') ,
            'title_ar.required' =>__('abouts.title_ar_required'),
            'title_en.required_if' =>__('abouts.title_en_required'),
            'details_ar.required' =>__('abouts.details_ar_required'),
            'details_en.required_if' =>__('abouts.details_en_required'),
            'type_id.required' =>__('abouts.type_id_required'),
        ];
    }
}
