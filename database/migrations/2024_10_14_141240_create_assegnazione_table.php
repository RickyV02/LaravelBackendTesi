<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssegnazioneTable extends Migration
{
    public function up()
    {
        Schema::create('assegnazione', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreign('corso_id')->references('id')->on('corso')->onDelete('cascade');
            $table->foreign('studente_id')->references('id')->on('studente')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('assegnazione');
    }
}
