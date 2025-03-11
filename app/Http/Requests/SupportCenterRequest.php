<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupportCenterRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'message' => 'required',
           // 'captcha' => 'required|captcha'
        ];
    }

    public function messages()
    {
        return [
            'required' => __('supportCenter.required'),
            'customer_email.email' => __('supportCenter.email_email'),
            'captcha'=>__('supportCenter.captcha')
        ];
    }
}
