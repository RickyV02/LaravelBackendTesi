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
            $table->foreignId('progettazione_id')->constrained('domanda')->onDelete('cascade');
            $table->foreignId('valutazione_id')->constrained('valutazione')->onDelete('cascade');
            $table->integer('esito');
        });
    }

    public function down()
    {
        Schema::dropIfExists('valutazione_domanda');
    }
}