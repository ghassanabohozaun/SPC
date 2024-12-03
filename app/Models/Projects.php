<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projects extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id', 'title_ar', 'title_en', 'details_ar', 'details_en', 'status',
        'photo', 'language', 'file', 'date',  'type','views','word'
    ];

    protected $appends = [ 'title'];

    public function getTitleAttribute(){
        if(config('app.locale') == 'ar'){
            return $this->attributes['title_ar'];
        }else{
            return $this->attributes['title_en'];

        }
    }

    function publications(){
        return $this->hasMany(Publications::class);
    }

}
