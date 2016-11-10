<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('rol_id')->unsigned();
            $table->integer('infocentro_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();
            //Clave de Roles Foranea
            $table->foreign('rol_id')->references('id')->on('rol');
            $table->foreign('infocentro_id')->references('id')->on('infocentros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
