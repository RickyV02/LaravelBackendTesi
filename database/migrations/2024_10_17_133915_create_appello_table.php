<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppelloTable extends Migration
{
    public function up()
    {
        Schema::create('appello', function (Blueprint $table) {
            $table->id();
            $table->datetime('data');
            $table->foreignId('corso_id')->constrained('corso');
            $table->foreignId('compito_id')->nullable()->constrained('testo_compito')->onDelete('cascade');
            $table->boolean('iniziato')->default(false);
            $table->boolean('terminato')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appello');
    }
}