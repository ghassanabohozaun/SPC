<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestQuestion extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'test_questions';
    protected $fillable = ['question', 'test_id'];
    protected $hidden = ['updated_at'];

    //  relationship
    public function test(): BelongsTo
    {
        return $this->belongsTo(Test::class);
    }
}
