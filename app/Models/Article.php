<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $table = "articles";
    protected $fillable = [
        'photo', 'language', 'title_ar',
        'title_en', 'abstract_ar', 'abstract_en',
        'publish_date', 'publisher_name', 'status','views'
    ];
    protected $hidden = ['updated_at'];
    //////////////////////////////////////////////////////////////
    /// language accessors
    public function getLanguageAttribute($value)
    {
        if ($value == 'ar') {
            return __('general.ar');
        } elseif ($value == 'ar_en') {
            return __('general.ar_en');
        }
    }

    public function comments(){
        return $this->hasMany(Comment::class , 'post_id')->where('status' , 'on');
    }
}
