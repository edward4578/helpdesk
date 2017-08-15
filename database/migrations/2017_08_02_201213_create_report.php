<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReport extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('reporte', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('fecha')->useCurrent();
            $table->string('serial_canaima');
            $table->text('descripcion');
            $table->integer('infocentro_id')->unsigned();
            $table->integer('beneficiario_x_canaima_id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->integer('estatus_id')->unsigned();
            $table->integer('falla_id')->unsigned();
            //Claves Foraneas
            $table->foreign('infocentro_id')->references('id')->on('infocentros');
            $table->foreign('beneficiario_x_canaima_id')->references('id')->on('beneficiario_x_canaima');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('estatus_id')->references('id')->on('estatus');
            $table->foreign('falla_id')->references('id')->on('fallas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::drop('reporte');
    }

}
