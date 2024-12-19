<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutSpc extends Model
{
    use HasFactory , SoftDeletes;

protected $table = 'about_spcs';
protected $fillable = [
        'title_ar',
        'title_en',
        'details_ar',
        'details_en',
        'status',
        'language'
];
    protected $hidden = ['updated_at'];
}
