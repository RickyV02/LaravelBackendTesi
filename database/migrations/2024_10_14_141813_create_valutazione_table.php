<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValutazioneTable extends Migration
{
    public function up()
    {
        Schema::create('valutazione', function (Blueprint $table) {
            $table->id();
            $table->integer('esito');
            $table->foreign('studente_id')->references('id')->on('studente')->onDelete('cascade');
            $table->foreign('appello_id')->references('id')->on('appello')->onDelete('cascade');
            $table->foreign('compito_id')->references('id')->on('testo_compito')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('valutazione');
    }
}