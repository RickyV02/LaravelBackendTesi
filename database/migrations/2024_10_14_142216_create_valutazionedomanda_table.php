<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValutazioneDomandaTable extends Migration
{
    public function up()
    {
        Schema::create('valutazione_domanda', function (Blueprint $table) {
            $table->id();
            $table->foreign('progettazione_id')->references('id')->on('compito_progettazione')->nullable();
            $table->foreign('valutazione_id')->references('id')->on('valutazione')->nullable();
            $table->integer('esito');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('valutazione_domanda');
    }
}