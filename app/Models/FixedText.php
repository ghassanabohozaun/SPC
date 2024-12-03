<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class FixedText extends Model
{

    protected $table = 'fixed_texts';
    protected $fillable = [
        'project_details_ar',
        'project_details_en',
        'about_association_title_ar',
        'about_association_title_en',
        'about_association_details_ar',
        'about_association_details_en',
        'about_association_founders_count',
        'about_association_beneficiaries_count',
        'founders_title_ar',
        'founders_title_en',
        'blog_title_ar',
        'blog_title_en',
        'testimonials_title_ar',
        'testimonials_title_en',
        'testimonials_details_ar',
        'testimonials_details_en',
        'counter_icon_1',
        'counter_number_1',
        'counter_name_1_ar',
        'counter_name_1_en',
        'counter_icon_2',
        'counter_number_2',
        'counter_name_2_ar',
        'counter_name_2_en',
        'counter_icon_3',
        'counter_number_3',
        'counter_name_3_ar',
        'counter_name_3_en',
        'counter_icon_4',
        'counter_number_4',
        'counter_name_4_ar',
        'counter_name_4_en',
    ];
    protected $hidden = ['created_at', 'updated_at'];
}
