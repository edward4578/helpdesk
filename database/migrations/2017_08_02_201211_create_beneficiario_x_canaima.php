<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiarioXCanaima extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('beneficiario_x_canaima', function (Blueprint $table) {
            $table->collation = 'utf8_general_ci';
            $table->charset = 'utf8';
            $table->increments('id');
            $table->string('serial_canaima');
            $table->text('descripcion');
            $table->integer('beneficiario_id')->unsigned();
            $table->integer('canaima_id')->unsigned();
            $table->foreign('canaima_id')->references('id')->on('canaima');
            $table->foreign('beneficiario_id')->references('id')->on('beneficiario');
        });
    }

    /**
     * Reverse the migrations.
     *  
     * @return void
     */
    public function down() {
        //
        Schema::drop('beneficiario_x_canaima');
    }

}
