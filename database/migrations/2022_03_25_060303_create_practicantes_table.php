<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practicantes', function (Blueprint $table) {
            $table->id();
            $table->string('matricula')->unique();
            $table->integer('nivelEscolar');
            $table->integer('horasSemanales');
            $table->float('calificacion', 4, 2);
            $table->integer('noMaterias');
            $table->foreignId('user_id');
            $table->foreignId('tutor_id');
            $table->foreignId('asesor_id');
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
        Schema::dropIfExists('practicantes');
    }
}
