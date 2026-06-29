<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pawi extends Model
{
    protected $fillable = [
        'is_anonymous',
        'visibility',
        'content',
        'is_letgo',
        'letgo_duration',
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
