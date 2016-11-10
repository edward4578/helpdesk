<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreateInfocentrosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('infocentros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mir');
            $table->string('nombre_infocentro');
            $table->string('descripcion');
            $table->boolean('activo');
            $table->string('direccion')->nullable();
            $table->integer('estado_id')->unsigned();
            $table->integer('municipio_id')->unsigned();
            $table->integer('parroquia_id')->unsigned();

            //Claves Foraneas de estado, municipio y parroquia
            $table->foreign('estado_id')->references('id')->on('estado');
            $table->foreign('municipio_id')->references('id')->on('municipio');
            $table->foreign('parroquia_id')->references('id')->on('parroquia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('infocentros');
    }

}
