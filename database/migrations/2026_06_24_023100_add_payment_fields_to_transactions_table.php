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
            if (!Schema::hasColumn('transactions', 'payment_type')) {
                $table->string('payment_type')->nullable()->after('status');
            }
            if (!Schema::hasColumn('transactions', 'ticket_code')) {
                $table->string('ticket_code')->unique()->nullable()->after('snap_token');
            }
            if (!Schema::hasColumn('transactions', 'is_checked_in')) {
                $table->boolean('is_checked_in')->default(false)->after('ticket_code');
            }
            if (!Schema::hasColumn('transactions', 'checked_in_at')) {
                $table->timestamp('checked_in_at')->nullable()->after('is_checked_in');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $columns = array_filter(['payment_type', 'ticket_code', 'is_checked_in', 'checked_in_at'], function($col) {
                return Schema::hasColumn('transactions', $col);
            });
            if (!empty($columns)) {
                $table->dropColumn($columns);
            }
        });
    }
};
