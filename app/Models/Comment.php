<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $table = 'comments';
    protected $fillable = [
        'person_ip',
        'person_name',
        'person_email',
        'commentary',
        'status',
        'post_id',
        'photo',
        'gender'
    ];
    protected $hidden = ['updated_at'];


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
