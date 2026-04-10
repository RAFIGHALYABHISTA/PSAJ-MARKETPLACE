<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
    'is_active' => 'boolean',
    'sort_order' => 'integer',
];
public function products(): HasMany
{
    return $this->hasMany(Product::class);
}
public static function getActiveCategories()
{
    return self::where('is_active', true)
        ->orderBy('sort_order')
        ->get();
}

public static function getDropdownOptions()
{
    return self::where('is_active', true)
        ->orderBy('sort_order')
        ->pluck('name', 'id');
}
}
