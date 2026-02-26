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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('affiliator_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('referral_code')->nullable();
            $table->decimal('total_product_price', 12, 2);
            $table->decimal('commission_amount', 12, 2)->default(0);
            $table->decimal('total_price', 12, 2);
            $table->enum('payment_method',['online','offline']);
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
            $table->enum('pickup_status', ['waiting', 'ready', 'taken'])->default('waiting');
            $table->string('invoice_number')->unique();
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
