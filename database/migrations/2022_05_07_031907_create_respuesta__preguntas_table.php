<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestaPreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta__preguntas', function (Blueprint $table) {
            $table->id();
            $table->boolean('correcta');
            $table->foreignId('actividad_id');
            $table->foreignId('cuadernillo_id');
            $table->foreignId('practicante_id');
            $table->foreignId('pregunta_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuesta__preguntas');
    }
}
