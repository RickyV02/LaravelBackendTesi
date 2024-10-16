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
            $table->json('link')->nullable();
            $table->text('argomento');
            $table->foreignId('corso_id')->constrained('corso')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lezione');
    }
}
