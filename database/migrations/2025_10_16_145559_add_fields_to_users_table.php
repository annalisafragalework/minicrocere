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
        Schema::table('users', function (Blueprint $table) {
            $table->string('lastname')->nullable()->after('name');
            $table->string('fiscal_code')->nullable()->after('lastname');
            $table->string('vat_number')->nullable()->after('fiscal_code');
            $table->string('phone')->nullable()->after('vat_number');
            $table->string('subscription_id')->nullable()->after('phone');
            $table->tinyInteger('subscription_type')->nullable()->after('subscription_id'); // 1 = mensile, 2 = annuale
            $table->boolean('is_trial')->default(false)->after('subscription_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'lastname',
                'fiscal_code',
                'vat_number',
                'phone',
                'subscription_id',
                'subscription_type',
                'is_trial',
            ]);
        });
    }
};
