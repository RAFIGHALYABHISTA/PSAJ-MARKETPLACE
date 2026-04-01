<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Affiliator extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
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
        'total_commissions',
        'total_withdrawals',
        'pending_balance',
        'status',
        'approved_at',
        'activated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'platforms' => 'array',
        'total_commissions' => 'decimal:2',
        'total_withdrawals' => 'integer',
        'pending_balance' => 'decimal:2',
        'approved_at' => 'datetime',
        'activated_at' => 'datetime',
    ];

    /**
     * Get the user associated with this affiliator.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all commissions for this affiliator.
     */
    public function commissions(): HasMany
    {
        return $this->hasMany(Commission::class, 'affiliator_id');
    }

    /**
     * Get all orders where this affiliator is involved.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'affiliator_id');
    }

    /**
     * Get all withdrawals for this affiliator.
     */
    public function withdrawals(): HasMany
    {
        return $this->hasMany(Withdrawal::class, 'affiliator_id');
    }
}