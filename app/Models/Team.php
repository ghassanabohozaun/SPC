<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes;

    protected $table = 'teams';
    protected $fillable = ['photo', 'status', 'name_ar', 'name_en',
        'position_ar', 'position_en', 'description_ar',
        'description_en', 'facebook', 'twitter', 'linkedIn', 'type',];

    protected $hidden = ['updated_at'];

    public function getTypeAttribute($value)
    {
        if ($value == 'founder') {
            return __('teams.founder');
        } elseif ($value == 'director') {
            return __('teams.director');
        } elseif ($value == 'member') {
            return __('teams.member');
        }
    }


}
