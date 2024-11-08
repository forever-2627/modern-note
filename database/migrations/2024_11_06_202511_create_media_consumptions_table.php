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
        Schema::create('media_consumptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedInteger('movies_count')->default(0);
            $table->unsignedInteger('tv_shows_count')->default(0);
            $table->unsignedInteger('books_count')->default(0);
            $table->unsignedInteger('music_count')->default(0);
            // Assuming you store favorites in JSON, you can adjust based on your needs
            $table->json('top_favorites')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_consumptions');
    }
};
