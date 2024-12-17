<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sections';
    protected $fillable = [
        'title_en',
        'title_ar',
        'publications_no',
        'language',
        'status',
    ];
    protected $hidden = ['updated_at'];


    // relationship
    public function publications(): HasMany
    {
        return $this->hasMany(Publication::class);
    }
}
