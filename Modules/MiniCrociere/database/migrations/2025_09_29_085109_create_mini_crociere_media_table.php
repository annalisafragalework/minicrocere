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
      Schema::create('mini_crociere_media', function (Blueprint $table) {
    $table->id();

    // Collegamento generico a qualsiasi entità
    $table->string('tipo'); // es: 'crociera', 'itinerario', 'escursione', 'cabina'
    $table->unsignedBigInteger('_id'); // ID dell'entità associata

    // Dati dell'immagine
    $table->string('path'); // es: 'images/crociere/crociera1.jpg'
    $table->string('titolo')->nullable();
    $table->text('descrizione')->nullable();

    $table->timestamps();

    // Indicizzazione per performance
    $table->index(['tipo', 'riferimento_id']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mini_crociere_media');
    }
};
