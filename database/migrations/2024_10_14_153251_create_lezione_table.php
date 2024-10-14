<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLezioneTable extends Migration
{
    public function up()
    {
        Schema::create('lezione', function (Blueprint $table) {
            $table->id();
            $table->integer('ordine');
            $table->date('data');
            $table->json('links'); 
            $table->text('argomento');
            $table->foreign('corso_id')->references('id')->on('corso');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lezione');
    }
}