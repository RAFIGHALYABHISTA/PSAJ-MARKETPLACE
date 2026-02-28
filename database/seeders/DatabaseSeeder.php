<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::firstOrCreate(
            ['email' => 'admin@smega.sch.id'],
            [
                'name' => 'Admin Smega',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );

        // Create Demo Affiliator Users
        $affiliators = [
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@smega.sch.id',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Siti Nurhaliza',
                'email' => 'siti@smega.sch.id',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Ahmad Wijaya',
                'email' => 'ahmad@smega.sch.id',
                'password' => Hash::make('password123'),
            ],
        ];

        foreach ($affiliators as $affiliator) {
            User::firstOrCreate(
                ['email' => $affiliator['email']],
                [
                    'name' => $affiliator['name'],
                    'password' => $affiliator['password'],
                    'email_verified_at' => now(),
                ]
            );
        }

        // Create Demo Products
        $products = [
            [
                'description' => 'Sabun Mandi Sariayu - Susu Murni',
                'price' => 25000,
                'image_url' => 'https://via.placeholder.com/300x300?text=Sabun+Mandi',
                'stock' => 50,
                'is_active' => true,
            ],
            [
                'description' => 'Shampo Sariayu - Herbal Asli',
                'price' => 35000,
                'image_url' => 'https://via.placeholder.com/300x300?text=Shampo',
                'stock' => 30,
                'is_active' => true,
            ],
            [
                'description' => 'Pelembab Wajah Sariayu',
                'price' => 45000,
                'image_url' => 'https://via.placeholder.com/300x300?text=Pelembab',
                'stock' => 20,
                'is_active' => true,
            ],
            [
                'description' => 'Masker Wajah Sariayu - Pencerah Kulit',
                'price' => 55000,
                'image_url' => 'https://via.placeholder.com/300x300?text=Masker',
                'stock' => 25,
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::firstOrCreate(
                ['description' => $product['description']],
                $product
            );
        }

        // Create Demo Orders (optional)
        $customer = User::where('email', 'budi@smega.sch.id')->first();
        $admin = User::where('email', 'admin@smega.sch.id')->first();

        if ($customer && !Order::where('invoice_number', 'INV-001-2026')->exists()) {
            $order = Order::create([
                'customer_id' => $customer->id,
                'affiliator_id' => null,
                'referral_code' => null,
                'total_product_price' => 100000,
                'commission_amount' => 0,
                'total_price' => 100000,
                'payment_method' => 'online',
                'payment_status' => 'pending',
                'pickup_status' => 'waiting',
                'invoice_number' => 'INV-001-2026',
            ]);

            // Add order items
            $product = Product::first();
            if ($product) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => 2,
                    'price' => $product->price,
                    'subtotal' => $product->price * 2,
                ]);
            }
        }
    }
}
