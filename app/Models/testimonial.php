<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class testimonial extends Model
{
    use SoftDeletes;

    protected $table = 'testimonials';
    protected $fillable = [
        'photo', 'language', 'opinion_ar', 'opinion_en', 'name_ar', 'name_en',
        'age', 'country', 'gender', 'job_title_ar', 'job_title_en', 'rating', 'status',
    ];
    protected $hidden = ['updated_at'];
    //////////////////////////////////////////////////////////////
    /// language accessors
    public function getLanguageAttribute($value)
    {
        if ($value == 'ar') {
            return __('general.ar');
        } elseif ($value == 'en') {
            return __('general.en');
        } elseif ($value == 'ar_en') {
            return __('general.ar_en');
        }
    }

    /// language accessors
    public function getGenderAttribute($value)
    {
        if ($value == 'male') {
            return __('general.male');
        } elseif ($value == 'female') {
            return __('general.female');
        }
    }
}
