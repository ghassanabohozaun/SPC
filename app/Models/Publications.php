<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publications extends Model
{
    use HasFactory,  SoftDeletes;

    protected $fillable = [
        'id', 'title_ar', 'title_en', 'details_ar', 'details_en', 'status',
        'photo', 'language', 'file', 'date', 'writer', 'type','views' ,'projects_id'
    ];

    function project(){
        return $this->belongsTo(Projects::class ,'projects_id');
    }


}
