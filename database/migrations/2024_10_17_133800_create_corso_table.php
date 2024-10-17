<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorsoTable extends Migration
{
    public function up()
    {
        Schema::create('corso', function (Blueprint $table) {
            $table->id();
            $table->string('canale', 50);
            $table->year('anno');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('corso');
    }
}