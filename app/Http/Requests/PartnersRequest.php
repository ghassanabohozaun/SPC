<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnersRequest extends FormRequest
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
            'photo' => 'required_without:hidden_photo|image|mimes:jpeg,jpg,png|max:1024',
        ];
    }

    public function messages()
    {
        return [
            'required' => __('partners.required'),
            'image' => __('partners.image'),
            'mimes' => __('partners.mimes'),
            'max' => __('partners.image_max'),
            'photo.required_without' => __('partners.photo_required'),
        ];
    }
}
