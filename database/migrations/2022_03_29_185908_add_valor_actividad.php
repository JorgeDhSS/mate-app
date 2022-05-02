<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddValorActividad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actividads', function (Blueprint $table) {
            $table->float('valor')->after('asesor_id');
            $table->foreignId('idgrupo')->after('asesor_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividads');
        /*Schema::table('pedidos', function (Blueprint $table) {
            $table->dropColumn('valor');
            $table->dropColumn('idgrupo');
        });*/
    }
}


