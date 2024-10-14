<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsegnamentoTable extends Migration
{
    public function up()
    {
        Schema::create('insegnamento', function (Blueprint $table) {
            $table->id();
            $table->primary(['professore_id', 'corso_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('insegnamento');
    }
}