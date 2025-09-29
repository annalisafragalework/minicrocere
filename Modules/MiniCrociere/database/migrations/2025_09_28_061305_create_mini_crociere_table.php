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
     Schema::create('mini_crociere', function (Blueprint $table) {
    $table->id();
    $table->string('nome');
    $table->text('descrizione')->nullable();
    $table->date('data_partenza');
    $table->date('data_ritorno');
    $table->string('porto_partenza');
    $table->string('porto_arrivo');
    $table->decimal('prezzo_base', 8, 2);
    $table->enum('stato', ['attiva', 'completata', 'annullata'])->default('attiva');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mini_crociere');
    }
};
