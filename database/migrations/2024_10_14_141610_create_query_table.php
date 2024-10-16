<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueryTable extends Migration
{
    public function up()
    {
        Schema::create('query', function (Blueprint $table) {
            $table->id();
            $table->text('testo');
            $table->integer('punteggio');
            $table->integer('ordine');
            $table->foreignId('sql_id')->constrained('compito_sql')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('query');
    }
}
