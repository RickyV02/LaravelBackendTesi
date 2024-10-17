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
            $table->foreignId('query_id')->constrained('query')->onDelete('cascade');
            $table->foreignId('valutazione_id')->constrained('valutazione')->onDelete('cascade');
            $table->integer('esito');
        });
    }

    public function down()
    {
        Schema::dropIfExists('valutazione_query');
    }
}