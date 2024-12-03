<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name' => 'required',
            'password' => 'sometimes|nullable|min:6',
            'gender' => 'required|in:male,female',
            'role_id' => 'required',
            'photo' => 'sometimes|nullable|image|mimes:jpg,jpeg,png|max:1048',
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
