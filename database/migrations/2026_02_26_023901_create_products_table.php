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
            $table->timestamps();
            $table->text('description')->nullable();
            $table->decimal('price', 12, 2);
            $table->string('image_url')->nullable();
            $table->integer('stock')->default(0);
            $table->boolean('is_active')->default(true);
        });  
    }

    /**aku adalah orang terkayand]==]====]]\
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
