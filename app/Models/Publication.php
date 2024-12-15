<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publication extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'publications';

    protected $fillable = [
        'section_id',
        'title_en_slug',
        'title_ar_slug',
        'title_en',
        'title_ar',
        'details_en',
        'details_ar',
        'added_date',
        'status',
        'photo',
        'language',
    ];
    protected $hidden = ['updated_at'];

    // relationship
    public function section()
    {
        return $this->hasOne(Section::class);
    }
}
