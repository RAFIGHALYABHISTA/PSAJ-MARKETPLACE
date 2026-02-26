<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'customer_id',
        'affiliator_id',
        'referral_code',
        'total_product_price',
        'commission_amount',
        'total_price',
        'payment_method',
        'payment_status',
        'pickup_status',
        'invoice_number',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'total_product_price' => 'decimal:2',
        'commission_amount' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    /**
     * Get the customer (user) that placed this order.
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    /**
     * Get the affiliator (user) for this order.
     */
    public function affiliator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'affiliator_id');
    }

    /**
     * Get all order items for this order.
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get all commissions for this order.
     */
    public function commissions(): HasMany
    {
        return $this->hasMany(Commission::class);
    }

    /**
     * Get the payment for this order.
     */
    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }
}
