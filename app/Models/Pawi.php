<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pawi extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'is_anonymous',
        'visibility',
        'content',
        'is_letgo',
        'letgo_duration',
        'archived_at',
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
