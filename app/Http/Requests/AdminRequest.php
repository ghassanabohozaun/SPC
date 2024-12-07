<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'password' => 'sometimes|nullable|min:6',
            'confirm_password' => 'same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('login.name_requires'),
            'email.required' => __('login.email_required'),
            'email.email' => __('login.email_email'),
            'password.min' => __('login.password_min'),
            'confirm_password.same' => __('login.same'),
        ];
    }
}
