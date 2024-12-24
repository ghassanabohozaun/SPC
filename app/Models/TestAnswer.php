<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestAnswer extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'test_answers';
    protected $fillable = ['answer_text', 'answer_value', 'test_id'];
    protected $hidden = ['updated_at'];

    // relationships
    public function test():BelongsTo
    {
        return $this->belongsTo(Test::class);
    }
}
