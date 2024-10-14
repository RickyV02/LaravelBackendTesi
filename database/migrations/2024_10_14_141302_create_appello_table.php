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
            $table->date('data');
            $table->foreign('id')->references('id')->on('corso');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appello');
    }
}