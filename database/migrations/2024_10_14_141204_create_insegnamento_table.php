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
            $table->foreignId('corso_id')->constrained('corso')->onDelete('cascade');
            $table->foreignId('professore_id')->constrained('professore')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('insegnamento');
    }
}
