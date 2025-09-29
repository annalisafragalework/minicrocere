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
      Schema::create('mini_crociere_itinerari', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mini_crociera_id')->constrained('mini_crociere')->onDelete('cascade');
            $table->unsignedTinyInteger('giorno'); // es. Giorno 1, Giorno 2...
            $table->string('localita');
            $table->text('attivita_previste')->nullable();
            $table->time('orario_arrivo')->nullable();
            $table->time('orario_partenza')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mini_crociere_itinerari');
    }
};
