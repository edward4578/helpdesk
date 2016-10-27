<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFallasXCanaimasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fallas_x_canaimas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('fecha_falla')->useCurrent();
            $table->string('descripcion')->nullable();
            $table->string('estatus'); 
            $table->integer('fallas_id')->unsigned();
            $table->integer('canaima_id')->unsigned();
            $table->integer('users_id')->unsigned();
            //tipo de llave - Clave forenea
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('fallas_id')->references('id')->on('fallas');
            $table->foreign('canaima_id')->references('id')->on('beneficiario_x_canaimas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fallas_x_canaimas');
    }
}
