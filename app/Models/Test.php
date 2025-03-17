<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tests';
    protected $fillable = [
        'test_name_slug',
        'test_name',
        'test_details',
        'question_count', //
        'scales_count', //
        'added_date',
        'number_times_of_use',
        'status',
        'file',
        'test_photo',
        'language',
    ];
    protected $hidden = ['updated_at'];

    //  Relationships
    // questions relation
    public function questions(): HasMany
    {
        return $this->hasMany(TestQuestion::class);
    }
    // answers relation
    public function answers(): HasMany
    {
        return $this->hasMany(TestAnswer::class);
    }
    // scales relation
    public function scales(): HasMany
    {
        return $this->hasMany(TestScale::class);
    }
}
