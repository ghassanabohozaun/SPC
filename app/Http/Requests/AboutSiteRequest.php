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
            'whom_brochure'=>'mimes:pdf|max:10240',
        ];

    }

    public function messages()
    {
       return [
          'whom_brochure.mimes'=> __('aboutSite.whom_brochure_mimes'),
          'whom_brochure.max'=> __('aboutSite.whom_brochure_max'),
       ];
    }
}
