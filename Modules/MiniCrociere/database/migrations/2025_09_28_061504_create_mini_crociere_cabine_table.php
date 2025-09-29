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
      Schema::create('mini_crociere_cabine', function (Blueprint $table) {
    $table->id();
    $table->foreignId('mini_crociera_id')->constrained('mini_crociere')->onDelete('cascade');
    $table->string('numero_cabina');
    $table->enum('tipo', ['singola', 'doppia', 'suite']);
    $table->decimal('prezzo', 8, 2);
    $table->boolean('disponibile')->default(true);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mini_crociere_cabine');
    }
};
