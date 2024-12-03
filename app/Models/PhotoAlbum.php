<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoAlbum extends Model
{
    protected $table = 'photo_albums';
    protected $fillable = [
        'language',
        'status',
        'title_ar',
        'title_en',
        'main_photo',
        'year',
    ];
    protected $hidden = ['updated_at',];

    /////////////////////////////////////////////////////////////////////
    /// files
    public function files()
    {
        return $this->hasMany('App\Upload_Files', 'relation_id', 'id')
            ->where('file_type', 'photo_albums_photos');
    }
    ///////////////////////////////////////////////////////////
    /// accessors
    public function getLanguageAttribute($value)
    {
        if ($value == 'ar') {
            return __('general.ar');
        } elseif ($value == 'en') {
            return __('general.en');
        } elseif ($value == 'ar_en') {
            return __('general.ar_en');
        }
    }

}
