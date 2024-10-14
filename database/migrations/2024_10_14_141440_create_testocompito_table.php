<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestoCompitoTable extends Migration
{
    public function up()
    {
        Schema::create('testo_compito', function (Blueprint $table) {
            $table->id();
            $table->foreign('studente_id')->references('id')->on('studente')->onDelete('cascade');
            $table->foreign('progettazione_id')->references('id')->on('compito_progettazione')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('testo_compito');
    }
}