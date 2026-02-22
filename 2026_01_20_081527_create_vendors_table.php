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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., Hilton Makkah, PIA Agent
            $table->enum('type', ['saudi_hotel', 'pak_ticket', 'general'])->default('general'); // Categorize vendors
            $table->string('city')->nullable(); // Makkah, Madina, Karachi
            $table->string('phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
