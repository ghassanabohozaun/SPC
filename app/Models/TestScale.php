<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestScale extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'test_scales';
    protected $fillable = ['statement', 'evaluation', 'minimum', 'maximum', 'photo', 'test_id'];
    protected $hidden = ['update_at'];

    // relationship
    // test
    public function test():BelongsTo
    {
       return $this->belongsTo(Test::class);
    }
}
