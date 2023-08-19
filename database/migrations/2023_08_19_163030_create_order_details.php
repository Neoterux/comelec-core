<?php

use App\Models\Item;
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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id('order_details_id');
            $table->foreignIdFor(Item::class, 'item_id');
            $table->foreignIdFor(Order::class, 'order_id');
            $table->text('item_name');
            $table->decimal('unit_price', 16, 2);
            $table->text('unit');
            $table->integer('quantity');
            $table->decimal('tax');
            $table->decimal('subtotal', 16, 2);
            $table->decimal('discount', 16, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
