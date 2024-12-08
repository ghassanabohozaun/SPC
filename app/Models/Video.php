<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use  HasFactory, SoftDeletes;

    protected $table = 'videos';
    protected $fillable = [
        'title_ar',
        'title_en',
        'link',
        'duration',
        'added_date',
        'status',
        'photo',
        'language',
    ];
    protected $hidden = ['updated_at'];
    //////////////////////////////////////////////////////////////
    /// accessors
    /// Language Accessor
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
