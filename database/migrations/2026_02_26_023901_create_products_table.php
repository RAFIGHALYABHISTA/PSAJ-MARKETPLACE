<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 12, 2);
            $table->string('image_url')->nullable();
            $table->integer('stock')->default(0);
            $table->foreignId('category_id')->nullable()->after('id')->constrained('category')->onDelete('set null');
            $table->enum('status', ['Stok Cukup', 'Stok Menipis', 'Stok Habis'])->default('Stok Cukup');
            $table->integer('commission_percentage')->default(10);
            $table->timestamps();
        });  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
