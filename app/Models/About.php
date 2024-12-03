<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class About extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'id', 'title_ar', 'title_en', 'details_ar', 'details_en', 'status',
        'photo', 'about_type_id' , 'file'
    ];


    public function type(){
        return $this->belongsTo(AboutType::class , 'about_type_id');
    }

    public function scopeStatus($query)
    {
        return $query->where('status', 'on');
    }

}
