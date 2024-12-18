<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'books';

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
        'photo',
        'file',
        'language',
    ];

    protected $hidden = ['updated_at'];
}
