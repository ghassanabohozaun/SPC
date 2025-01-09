<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sliders';
    protected $fillable = [
        'title_en',
        'title_ar',
        'details_en',
        'details_ar',
        'order',
        'url_en',
        'url_ar',
        'status',
        'details_status',
        'button_status',
        'photo',
        'language',
    ];
    protected $hidden = ['updated_at'];


    //////////////////////////////////////////////////////////////
    // accessors
    // language
    // public function getLanguageAttribute($value)
    // {
    //     if ($value == 'ar') {
    //         return __('general.ar');
    //     } elseif ($value == 'ar_en') {
    //         return __('general.ar_en');
    //     }
    // }

    // Details Status
    public function getDetailsStatusAttribute($value)
    {
        if ($value == 'show') {
            return __('sliders.show');
        } elseif ($value == 'hide') {
            return __('sliders.hide');
        }
    }

    // Button Status
    public function getButtonStatusAttribute($value)
    {
        if ($value == 'show') {
            return __('sliders.show');
        } elseif ($value == 'hide') {
            return __('sliders.hide');
        }
    }
}
