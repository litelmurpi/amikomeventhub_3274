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
        Schema::table('transactions', function (Blueprint $table) {
            // Drop the old foreign key constraint
            $table->dropForeign(['event_id']);
        });

        Schema::table('transactions', function (Blueprint $table) {
            // Modify event_id column to be nullable
            $table->unsignedBigInteger('event_id')->nullable()->change();
            
            // Re-create the foreign key constraint with nullOnDelete
            $table->foreign('event_id')
                  ->references('id')
                  ->on('events')
                  ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Drop the nullOnDelete foreign key constraint
            $table->dropForeign(['event_id']);
        });

        Schema::table('transactions', function (Blueprint $table) {
            // Revert event_id to be non-nullable
            // Note: If there are null event_id rows, this might fail, which is expected for database integrity.
            $table->unsignedBigInteger('event_id')->nullable(false)->change();
            
            // Re-create the original foreign key constraint with cascadeOnDelete
            $table->foreign('event_id')
                  ->references('id')
                  ->on('events')
                  ->cascadeOnDelete();
        });
    }
};
