<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBenefiriarioModelsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('beneficiario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cedula')->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('email')->unique(); 
            $table->integer('direccion_id')->unsigned();
            //clave foranea de la direccion
            $table->foreign('direccion_id')->references('id')->on('direccion');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('beneficiario');
    }

}
