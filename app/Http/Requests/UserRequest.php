<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|email|unique:admin',
            'password' => 'required|min:6',
            'gender' => 'required|in:male,female',
            'role_id' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:1024',
            'mobile' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => __('users.required'),
            'in' => __('users.in'),
            'email.unique' => __('users.email_unique'),
            'email.email' => __('users.email_email'),
            'password.min' => __('users.min'),
            'photo.image' => __('users.image'),
            'photo.required' => __('users.image_required'),
            'photo.mimes' => __('users.mimes'),
            'photo.max' => __('users.image_max'),

        ];
    }
}
