<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoAlbumsRequest extends FormRequest
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
            'title_en' => 'required',
            'title_ar' => 'required_if:site_lang_ar,on',
            'year' => 'required',
            'main_photo' => 'required_without:hidden_photo|image|mimes:jpeg,jpg,png|max:1024',
        ];
    }

    public function messages()
    {
        return [
            'required' => __('photoAlbums.required'),
            'required_if' => __('photoAlbums.required'),
            'in' => __('photoAlbums.in'),
            'image' => __('photoAlbums.image'),
            'mimes' => __('photoAlbums.mimes'),
            'max' => __('photoAlbums.image_max'),
            'photo.required' => __('photoAlbums.photo_required'),
            'required_without' => __('photoAlbums.photo_required'),
        ];
    }
}
