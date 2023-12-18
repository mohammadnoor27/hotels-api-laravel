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
        Schema::create('favorite_user_hotel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Assuming users table has 'id' field.
            $table->foreignId('hotel_id')->constrained(); // Assuming hotels table has 'id' field.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorite_user_hotel');
    }
};
