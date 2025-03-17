<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "articles";
    protected $fillable = [
        'title_en_slug',
        'title_ar_slug',
        'title_en',
        'title_ar',
        'abstract_en',
        'abstract_ar',
        'publish_date',
        'publisher_name',
        'status',
        'views',
        'photo',
        'file',
        'language',
    ];
    protected $hidden = ['updated_at'];


    // relationship
    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id');
    }
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
}
