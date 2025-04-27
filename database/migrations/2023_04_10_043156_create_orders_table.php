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
            $table->string('customer_name');
            $table->unsignedInteger('table_number');
            $table->text('order_note')->nullable();
            $table->dateTime('order_date');
            $table->enum('order_status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending');
            $table->integer('total_products');
            $table->string('invoice_no')->nullable();
            $table->integer('total_amount')->nullable();
            $table->enum('payment_method', ['kasir', 'qris'])->default('kasir');
            $table->enum('payment_status', ['unpaid', 'paid'])->default('unpaid');

            // Add QRIS-specific fields
            $table->string('qris_url')->nullable(); // QRIS payment link/QR code URL
            $table->timestamp('qris_expiration')->nullable(); // Expiration time for QRIS
            $table->string('qris_transaction_id')->nullable(); // Transaction ID for QRIS transaction
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
