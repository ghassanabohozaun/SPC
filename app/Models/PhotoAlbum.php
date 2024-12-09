<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoAlbum extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'photo_albums';
    protected $fillable = [
        'title_ar',
        'title_en',
        'status',
        'year',
        'main_photo',
        'language',
    ];
    protected $hidden = ['updated_at',];

    /////////////////////////////////////////////////////////////////////
    /// files
    public function files()
    {
        return $this->hasMany('App\UploadFile', 'relation_id', 'id')
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
