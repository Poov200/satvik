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

    $table->string('order_number')->unique();

    $table->string('customer_name');

    $table->string('phone', 20);

    $table->text('address');

    $table->json('items');

    $table->decimal('total_amount', 10, 2);

    $table->enum('payment_method', [
        'COD',
        'UPI'
    ])->default('COD');

    $table->enum('payment_status', [
        'Pending',
        'Paid',
        'Failed'
    ])->default('Pending');

    $table->string('upi_transaction_id')
          ->nullable();

    $table->enum('order_status', [
        'Pending',
        'Confirmed',
        'Processing',
        'Shipped',
        'Delivered',
        'Cancelled'
    ])->default('Pending');

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
