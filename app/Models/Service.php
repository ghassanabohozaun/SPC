<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'services';
    protected $fillable = [
        'title_en_slug',
        'title_ar_slug',
        'title_en',
        'title_ar',
        'summary_en',
        'summary_ar',
        'details_en',
        'details_ar',
        'status',
        'is_treatment_area',
        'photo',
        'language',
    ];
    protected $hidden = ['updated_at'];
}
