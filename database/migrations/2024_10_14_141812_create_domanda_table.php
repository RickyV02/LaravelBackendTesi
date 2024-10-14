<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomandaTable extends Migration
{
    public function up()
    {
        Schema::create('domanda', function (Blueprint $table) {
            $table->id();
            $table->text('testo');
            $table->integer('punteggio');
            $table->integer('ordine');
            $table->foreign('progettazione_id')->references('id')->on('compito_progettazione')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('domanda');
    }
}