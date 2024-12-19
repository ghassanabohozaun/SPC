<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutSiteRequest extends FormRequest
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
            'whom_brochure' => 'mimes:pdf|max:10240',
            'who_are_we_profile' => 'mimes:pdf|max:10240',
            'why_chose_us_photo' => 'image|mimes:jpeg,jpg,png|max:1024',
        ];
    }

    public function messages()
    {
        return [
            'whom_brochure.mimes' => __('aboutSite.whom_brochure_mimes'),
            'whom_brochure.max' => __('aboutSite.whom_brochure_max'),
            'who_are_we_profile.mimes' => __('aboutSite.who_are_we_profile_mimes'),
            'who_are_we_profile.max' => __('aboutSite.who_are_we_profile_max'),

            'why_chose_us_photo.image' => __('aboutSite.why_chose_us_photo_image'),
            'why_chose_us_photo.mimes' => __('aboutSite.why_chose_us_photo_mimes'),
            'why_chose_us_photo.max' => __('aboutSite.why_chose_us_photo_max'),
        ];
    }
}
