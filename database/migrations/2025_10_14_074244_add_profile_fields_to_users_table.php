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
    $table->string('codefiscal')->nullable()->after('lastname');
    $table->string('vat_number')->nullable()->after('codefiscal');
    $table->string('phone')->nullable()->after('vat_number');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
