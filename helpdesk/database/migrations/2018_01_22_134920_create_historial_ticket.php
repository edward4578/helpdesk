<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialTicket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('historialTicket', function (Blueprint $table) {
            $table->collation = 'utf8_general_ci';
            $table->charset = 'utf8';
            $table->increments('id');
            $table->string('descripcion')->nullable();
            $table->integer('ticket_id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->integer('soluciones_id')->unsigned()->nullable();
            $table->timestamps();
            //Claves Foreaneas
            $table->foreign('ticket_id')->references('id')->on('ticket');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('soluciones_id')->references('id')->on('soluciones')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('historialTicket');
    }
}
