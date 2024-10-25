<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrenotazioneTable extends Migration
{
    public function up()
    {
        Schema::create('prenotazione', function (Blueprint $table) {
            $table->id();
            $table->integer('esito')->nullable();
            $table->foreignId('studente_id')->constrained('studente')->onDelete('cascade');
            $table->foreignId('appello_id')->constrained('appello')->onDelete('cascade');
            $table->foreignId('compito_id')->constrained('testo_compito')->onDelete('cascade')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('valutazione');
    }
}
