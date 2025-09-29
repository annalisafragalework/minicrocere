<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 

return new class extends Migration {
    public function up()
    {
        Schema::create('mini_crociere_utenti', function (Blueprint $table) {
            $table->id();

            // Dati utente locali
            $table->string('nome');
            $table->string('cognome');
            $table->string('email')->unique();
            $table->string('telefono')->nullable();
            $table->date('data_nascita')->nullable();
            $table->string('documento_identita')->nullable();

            // Collegamento al core User
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            // Collegamento alla crociera
            $table->unsignedBigInteger('mini_crociera_id');
            $table->foreign('mini_crociera_id')->references('id')->on('mini_crociere')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mini_crociere_utenti');
    }
};
