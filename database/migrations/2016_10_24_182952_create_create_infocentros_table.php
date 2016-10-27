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
            $table->integer('direccion_id')->unsigned();

            // Campo para la tabla Direccion
            $table->foreign('direccion_id')->references('id')->on('direccion');
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
