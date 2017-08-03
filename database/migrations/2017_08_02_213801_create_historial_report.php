<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialReport extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('historialReporte', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion')->nullable();
            $table->integer('reporte_id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->integer('soluciones_id')->unsigned()->nullable();
            //Claves Foreaneas
            $table->foreign('reporte_id')->references('id')->on('reporte');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('soluciones_id')->references('id')->on('soluciones')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::drop('historialReporte');
    }

}
