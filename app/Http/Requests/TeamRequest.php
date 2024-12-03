<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'name_ar' => 'required',
            'name_en' => 'required',
            'position_ar' => 'required',
            'position_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'type' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => __('teams.required'),
            'image' => __('teams.image'),
            'mimes' => __('teams.mimes'),
            'max' => __('teams.image_max'),
            'photo.required_without' => __('teams.photo_required'),
        ];
    }
}
