<?php

use App\Models\CreditCard;
use App\Models\User;
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
        Schema::create('order', function (Blueprint $table) {
            $table->id('order_id');
            $table->foreignIdFor(CreditCard::class, 'card_id');
            $table->foreignIdFor(User::class, 'user_id');
            $table->text('delivery_address');
            $table->text('order_no');
            $table->text('bill_address');
            $table->text('status');
            $table->decimal('total', 16, 2);
            $table->decimal('shipping_cost', 16, 2);
            $table->text('tracking_no');
            $table->boolean('was_cancelled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
