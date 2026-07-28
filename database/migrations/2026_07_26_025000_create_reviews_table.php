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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            // Menghapus physical foreign key constraints agar kompatibel dengan MyISAM di InfinityFree
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('event_id');
            $table->tinyInteger('rating')->unsigned(); // rating 1-5
            $table->text('comment');
            $table->timestamps();
            
            // Mencegah user yang sama review event yang sama lebih dari 1 kali di level database
            $table->unique(['user_id', 'event_id']); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};