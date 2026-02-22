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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Account Name (e.g., Cash in Hand, Vendor Ali, Agent Ahmed)
            $table->string('code')->nullable(); // e.g., 1001, 2005 (Account Code)

            // Account Types: Asset, Liability, Equity, Income, Expense
            $table->enum('type', ['asset', 'liability', 'equity', 'income', 'expense']);

            // Polymorphic relation (Isse future mein koi bhi naya banda add ho sakta hai)
            // Agar yeh account kisi Vendor ka hai to uska ID yahan ayega
            $table->nullableMorphs('accountable');

            $table->decimal('current_balance', 15, 2)->default(0); // Performance ke liye cache balance
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
