<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadFile extends Model
{
    protected $table = 'files';

    protected $fillable = [
        'file_name',
        'file_size',
        'file_path',
        'file_after_upload',
        'full_path_after_upload',
        'file_mimes_type',
        'file_type',
        'relation_id',
    ];
}
