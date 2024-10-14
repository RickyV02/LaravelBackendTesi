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
            $table->foreign('sql_id')->references('id')->on('compito_sql')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('query');
    }
}