<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Affiliator extends Model
{
    protected $fillable = [
        'user_id',
        'store_name',
        'store_description',
        'phone',
        'address',
        'platforms',
        'bank_name',
        'bank_account_number',
        'bank_account_name',
        'status',
    ];

    protected $casts = [
        'platforms' => 'array',
        'approved_at' => 'datetime',
        'activated_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isSuspended(): bool
    {
        return $this->status === 'suspended';
    }
}
