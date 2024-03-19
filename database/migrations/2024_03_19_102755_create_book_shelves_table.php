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
        Schema::create('book_shelves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->references('id')->on('books')->cascadeOnDelete();
            $table->foreignId('shelf_id')->references('id')->on('shelves')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_shelves');
    }
};
