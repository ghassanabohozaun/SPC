<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixedText extends Model
{
    use HasFactory;

    protected $table = 'fixed_texts';
    protected $fillable = [
            'about_spc_title_en',
            'about_spc_title_ar',
            'about_spc_details_en',
            'about_spc_details_ar',
            'about_spc_goal_one_en',
            'about_spc_goal_two_en',
            'about_spc_goal_three_en',
            'about_spc_goal_four_en',
            'about_spc_goal_one_ar',
            'about_spc_goal_two_ar',
            'about_spc_goal_three_ar',
            'about_spc_goal_four_ar',
            'about_spc_photo',
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
