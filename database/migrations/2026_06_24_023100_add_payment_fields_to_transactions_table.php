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
            $table->string('payment_type')->nullable()->after('status');
            $table->string('ticket_code')->unique()->nullable()->after('snap_token');
            $table->boolean('is_checked_in')->default(false)->after('ticket_code');
            $table->timestamp('checked_in_at')->nullable()->after('is_checked_in');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn(['payment_type', 'ticket_code', 'is_checked_in', 'checked_in_at']);
        });
    }
};
