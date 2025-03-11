<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportCenter extends Model
{
    protected $table = 'support_centers';
    protected $fillable = [
        'name',
        'mobile',
        'email',
        'title',
        'message',
        'status',
    ];

    protected $hidden = ['updated_at'];
}

