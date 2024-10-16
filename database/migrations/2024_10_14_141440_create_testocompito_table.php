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
            $table->foreignId('sql_id')->nullable()->constrained('compito_sql')->onDelete('cascade');
            $table->foreignId('progettazione_id')->nullable()->constrained('compito_progettazione')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('testo_compito');
    }
}
