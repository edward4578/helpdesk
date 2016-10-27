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
            $table->string('descripcion');
            $table->timestamp('fecha_ingreso')->useCurrent();
            $table->integer('infocentro_id')->unsigned();
            $table->integer('canaima_id')->unsigned();
            $table->integer('beneficiario_id')->unsigned();
            $table->integer('users_id')->unsigned();

            //Claves Foraneas
            $table->foreign('infocentro_id')->references('id')->on('infocentros');
            $table->foreign('canaima_id')->references('id')->on('canaima');
            $table->foreign('beneficiario_id')->references('id')->on('beneficiario');
            $table->foreign('users_id')->references('id')->on('users');
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
