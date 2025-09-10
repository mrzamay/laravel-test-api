<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['user_id', 'title', 'description'];

    protected $casts = [
        'status' => 'string'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
    return $this->belongsTo(User::class);
    }
}
