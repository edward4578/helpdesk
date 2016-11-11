<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiarioXCanaimasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('beneficiario_x_canaimas', function (Blueprint $table) {
            $table->increments('id');

            $table->timestamp('fecha_ingreso')->useCurrent();
            $table->integer('infocentro_id')->unsigned();
            $table->integer('canaima_id')->unsigned();
            $table->integer('beneficiario_id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->integer('fallas_id')->unsigned();
            $table->string('estatus');
            $table->string('descripcion');
            //Claves Foraneas
            $table->foreign('infocentro_id')->references('id')->on('infocentros');
            $table->foreign('canaima_id')->references('id')->on('canaima');
            $table->foreign('beneficiario_id')->references('id')->on('beneficiario');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('fallas_id')->references('id')->on('fallas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('beneficiario_x_canaimas');
    }

}
