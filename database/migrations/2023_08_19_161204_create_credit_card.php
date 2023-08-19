<?php

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
        Schema::create('credit_card', function (Blueprint $table) {
            $table->id('card_id');
            $table->foreignIdFor(User::class, 'user_id');
            $table->text('number');
            $table->text('nickname');
            $table->text('expiration_date');
            $table->text('ccv');
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_card');
    }
};
