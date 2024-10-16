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
            $table->foreignId('corso_id')->constrained('corso');
            $table->foreignId('professore_id')->constrained('professore');
            $table->foreignId('studente_id')->constrained('studente');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('assegnazione');
    }
}
