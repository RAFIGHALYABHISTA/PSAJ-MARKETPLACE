<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Withdrawal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'affiliator_id',
        'amount',
        'status',
        'processed_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'amount' => 'integer',
        'processed_at' => 'datetime',
    ];

    /**
     * Get the affiliator for this withdrawal.
     */
    public function affiliator(): BelongsTo
    {
        return $this->belongsTo(Affiliator::class);
    }
}
