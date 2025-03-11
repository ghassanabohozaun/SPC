<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSite extends Model
{
    use HasFactory;

    protected $table = 'about_sites';
    protected $fillable = [
        'whom_en',
        'whom_ar',
        'contact_us_en',
        'contact_us_ar',
        'whom_brochure',
        'who_are_we_en',
        'who_are_we_ar',
        'who_are_we_profile', //borchure
        'about_doctor_en',
        'about_doctor_ar',
        'why_chose_us_title_en',
        'why_chose_us_title_ar',
        'why_chose_us_details_en',
        'why_chose_us_details_ar',
        'why_chose_us_photo',

        'counter_icon_one',
        'counter_ar_one',
        'counter_en_one',
        'counter_number_one',

        'counter_icon_two',
        'counter_ar_two',
        'counter_en_two',
        'counter_number_two',

        'counter_icon_three',
        'counter_ar_three',
        'counter_en_three',
        'counter_number_three',

        'counter_icon_four',
        'counter_ar_four',
        'counter_en_four',
        'counter_number_four',

    ];
    protected $hidden = ['updated_at'];
}
