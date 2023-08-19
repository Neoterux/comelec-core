<?php

use App\Models\Bill;
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
        Schema::create('bill_details', function (Blueprint $table) {
            $table->id('bill_details_id');
            $table->foreignIdFor(Bill::class, 'bill_id');
            $table->text('item_description');
            $table->integer('quantity');
            $table->text('condition');
            $table->decimal('price', 16, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill_details');
    }
};
