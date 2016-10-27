<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolucionesXFallasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soluciones_x_fallas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('fecha_solucion')->useCurrent();
            $table->integer('solucion_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('fxc_id')->unsigned();
            
            // Clave foranea para solucion y la falla de la canaima
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('solucion_id')->references('id')->on('soluciones');
            $table->foreign('fxc_id')->references('id')->on('fallas_x_canaimas');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('soluciones_x_fallas');
    }
}
