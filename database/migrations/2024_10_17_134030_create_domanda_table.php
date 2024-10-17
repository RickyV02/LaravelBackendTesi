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
            $table->foreignId('progettazione_id')->constrained('compito_progettazione')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('domanda');
    }
}