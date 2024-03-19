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
        Schema::create('genre_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('genre_id')->references('id')->on('genres')->cascadeOnDelete();
            $table->foreignId('book_id')->references('id')->on('books')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genre_books');
    }
};
