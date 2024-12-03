<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AboutType extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name_ar' , 'name_en'
    ];

    public function about(){
        return $this->hasMany(About::class) ;
    }
}
