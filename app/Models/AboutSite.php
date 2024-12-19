<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSite extends Model
{
    use HasFactory;

    protected $table = 'about_sites';
    protected $fillable = [
        'whom_ar',
        'whom_en',
        'contact_us_ar',
        'contact_us_en',
        'whom_brochure',
        'who_are_we_ar',
        'who_are_we_en',
        'who_are_we_profile', //borchure
        'about_doctor_en',
        'about_doctor_ar',
        'why_chose_us_title_en',
        'why_chose_us_title_ar',
        'why_chose_us_details_en',
        'why_chose_us_details_ar',
        'why_chose_us_photo'
    ];
    protected $hidden = ['updated_at'];

}
