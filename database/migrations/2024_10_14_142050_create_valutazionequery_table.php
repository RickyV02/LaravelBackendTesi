<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValutazioneQueryTable extends Migration
{
    public function up()
    {
        Schema::create('valutazione_query', function (Blueprint $table) {
            $table->id();
            $table->integer('esito');
            $table->timestamps();
            $table->foreign('query_id')->references('id')->on('query')->nullable();
            $table->foreign('valutazione_id')->references('id')->on('valutazione')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('valutazione_query');
    }
}