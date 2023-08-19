<?php

use App\Models\Order;
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
        Schema::create('bill', function (Blueprint $table) {
            $table->id('bill_id');
            $table->foreignIdFor(Order::class, 'order_id');
            $table->text('bill_no');
            $table->text('order_no');
            $table->text('biller');
            $table->text('billing_address');
            $table->timestamp('date');
            $table->decimal('shipping', 16, 2);
            $table->decimal('subtotal', 16, 2);
            $table->decimal('taxes', 16, 2);
            $table->decimal('total', 16, 2);
            $table->text('payment_methods');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill');
    }
};
