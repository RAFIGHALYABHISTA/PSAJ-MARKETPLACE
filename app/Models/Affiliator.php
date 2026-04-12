<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Affiliator extends Model
{
    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'bank_name',
        'bank_account_number',
        'bank_account_name',
        'status',
        'referral_code',
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
        return $this->status === 'aktif';
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isSuspended(): bool
    {
        return $this->status === 'suspended';
    }

    protected static function booted()
    {
        static::creating(function ($affiliator) {
            // Kita ambil nama dari user yang sedang login
            $userName = auth()->user()->name ?? 'USER';
            
            // Generate kode berdasarkan nama
            $affiliator->referral_code = self::generateUniqueReferralCode($userName);
        });
    }

    private static function generateUniqueReferralCode($name)
    {
        // 1. Bersihkan nama dari spasi dan ambil 3 huruf pertama (Contoh: "Budi Santoso" -> "BUD")
        $cleanName = strtoupper(Str::slug($name, ''));
        $prefix = substr($cleanName, 0, 3);
        
        // Jika nama terlalu pendek (kurang dari 3 huruf), tambahkan karakter X
        $prefix = str_pad($prefix, 3, 'X');

        do {
            // 2. Tambahkan 4 karakter acak di belakangnya
            // Hasil akhir contoh: BUD-A1Z9, SAR-K8W2
            $code = $prefix . strtoupper(Str::random(4));
        } while (self::where('referral_code', $code)->exists());

        return $code;
    }
}
