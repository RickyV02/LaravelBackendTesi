<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompitoSqlTable extends Migration
{
    public function up()
    {
        Schema::create('compito_sql', function (Blueprint $table) {
            $table->id();
            $table->text('schema_compito');
            $table->text('dati');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('compito_sql');
    }
}