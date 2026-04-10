<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Skincare',
                'slug' => 'skincare',
                'description' => 'Produk perawatan kulit untuk wajah dan tubuh',
                'icon' => 'fas fa-spa',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Bodycare',
                'slug' => 'bodycare',
                'description' => 'Produk perawatan tubuh untuk kulit sehat',
                'icon' => 'fas fa-hand-holding-heart',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Decorative',
                'slug' => 'decorative',
                'description' => 'Produk dekoratif untuk kecantikan',
                'icon' => 'fas fa-palette',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Haircare',
                'slug' => 'haircare',
                'description' => 'Produk perawatan rambut',
                'icon' => 'fas fa-cut',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Make Up',
                'slug' => 'make-up',
                'description' => 'Produk makeup untuk wajah dan bibir',
                'icon' => 'fas fa-face-smile',
                'sort_order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            // Use firstOrCreate to avoid duplicate key errors
            Category::firstOrCreate(
                ['slug' => $category['slug']],
                [
                    'name' => $category['name'],
                    'description' => $category['description'],
                    'icon' => $category['icon'],
                    'sort_order' => $category['sort_order'],
                    'is_active' => $category['is_active'],
                ]
            );
        }
    }
}
