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

    $table->string('entita'); // 'crociera', 'cabina', 'itinerario', 'escursione'
    $table->unsignedBigInteger('entita_id'); // ID dell'entità associata

    $table->string('path'); // es: 'images/cabine/cabina1.jpg'
    $table->string('titolo')->nullable();
    $table->text('descrizione')->nullable();

    $table->timestamps();

    $table->index(['entita', 'entita_id']);
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
