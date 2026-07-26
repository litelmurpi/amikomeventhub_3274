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
            if (!Schema::hasColumn('transactions', 'promo_code')) {
                $table->string('promo_code')->nullable()->after('total_price');
            }
            if (!Schema::hasColumn('transactions', 'discount_amount')) {
                $table->integer('discount_amount')->default(0)->after('promo_code');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $columns = array_filter(['promo_code', 'discount_amount'], function($col) {
                return Schema::hasColumn('transactions', $col);
            });
            if (!empty($columns)) {
                $table->dropColumn($columns);
            }
        });
    }
};
