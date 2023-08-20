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
        Schema::rename('shopping_cart_details', 'shopping_cart_content');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('shopping_cart_content', 'shopping_cart_details');
    }
};
