<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'site_name_ar' => 'required|max:100',
            'site_name_en' => 'required|max:100',
            'site_icon' => 'image|mimes:png,svg,jpeg,jpg|max:1024',
            'site_logo' => 'image|mimes:png,svg,jpeg,jpg|max:1024',
        ];
    }

    public function messages()
    {
        return [
            'required' => __('settings.required'),
            'max' => __('settings.max'),
            'in' => __('settings.in'),
            'image' => __('settings.image'),
            'image_max' => __('settings.image_max'),
            'site_icon.mimes' => __('settings.site_icon_mimes'),
            'site_logo.mimes' => __('settings.site_logo_mimes'),
        ];
    }
}
