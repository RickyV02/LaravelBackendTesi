<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvvisiTable extends Migration
{
    public function up()
    {
        Schema::create('avvisi', function (Blueprint $table) {
            $table->id();
            $table->text('testo');
            $table->date('data_pubblicazione');
            $table->foreignId('corso_id')->constrained('corso')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('avvisi');
    }
}
