<?php

namespace App\Models;

use App\Policies\PromptPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[UsePolicy(PromptPolicy::class)]
class Prompt extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'is_public',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
