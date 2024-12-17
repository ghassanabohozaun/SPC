<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MyNew extends Model
{
    use HasFactory, SoftDeletes;
    protected $tabl = 'my_news';
    protected $fillable = [
        'title_en_slug',
        'title_ar_slug',
        'title_en',
        'title_ar',
        'details_en',
        'details_ar',
        'added_date',
        'status',
        'language',
        'photo'
    ];
    protected $hidden = ['updated_date'];
}
