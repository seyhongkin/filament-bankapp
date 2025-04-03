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
        Schema::create('cards', function (Blueprint $table) {
            $table->unsignedBigInteger('card_number')->primary();
            $table->string('card_holder', 40)->unique();
            $table->string('valid_thru', 5);
            $table->decimal('balance', 10, 2);
            $table->string('bank_name', 20);
            $table->boolean('is_default')->default(false);
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
