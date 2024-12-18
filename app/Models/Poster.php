<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poster extends Model
{
    use HasFactory, SoftDeletes;
    protected $table  = 'posters';
    protected $fillable = [
        'title_en_slug',
        'title_ar_slug',
        'title_en',
        'title_ar',
        'added_date',
        'publisher_name',
        'status',
        'language',
        'photo',
        'file',
    ];
}
