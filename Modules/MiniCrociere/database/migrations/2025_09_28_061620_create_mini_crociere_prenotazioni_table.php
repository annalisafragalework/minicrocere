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
   Schema::create('mini_crociere_prenotazioni', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('mini_crociera_id')->constrained('mini_crociere')->onDelete('cascade');
    $table->foreignId('cabina_id')->constrained('mini_crociere_cabine')->onDelete('cascade');
    $table->unsignedTinyInteger('numero_persone');
    $table->date('data_prenotazione');
    $table->enum('stato', ['confermata', 'in_attesa', 'cancellata'])->default('in_attesa');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mini_crociere_prenotazioni');
    }
};
