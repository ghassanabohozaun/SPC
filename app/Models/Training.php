<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Training extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'trainings';
    protected $fillable = [
        'title_ar',
        'title_en',
        'status',
        'photo',
        'started_date',
        'language',
    ];
    protected $primaryKey = 'id';
    protected $hidden = [];
}
