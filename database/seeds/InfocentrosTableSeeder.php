<?php

use Illuminate\Database\Seeder;

class InfocentrosTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        try {
            DB::table("infocentros")->insert([ "mir" => "MIR01", "nombre_infocentro" => "ACEVEDO - CAUCAGUA", "descripcion" => "TIENEN PROBLEMAS CON EL INTERNET", "activo" => 1, "estado_id" => 13, "municipio_id" => 166, "parroquia_id" => 571,]);
            DB::table("infocentros")->insert([ "mir" => "MIR02", "nombre_infocentro" => "PUEBLO DE TAPIPA", "descripcion" => "LE FALTA DOTACIÓN DE EQUIPO", "activo" => 1, "estado_id" => 13, "municipio_id" => 166, "parroquia_id" => 576,]);
            DB::table("infocentros")->insert([ "mir" => "MIR03", "nombre_infocentro" => "CUMBO", "descripcion" => "", "activo" => 1, "estado_id" => 13, "municipio_id" => 179, "parroquia_id" => 614,]);
            DB::table("infocentros")->insert(["mir" => "MIR04", "nombre_infocentro" => "BP JUAN PABLO SOJO", "descripcion" => "", "activo" => 1, "estado_id" => 13, "municipio_id" => 179,"parroquia_id" => 613,]);
            DB::table("infocentros")->insert([ "mir" => "MIR05", "nombre_infocentro" => "PUEBLO NUEVO (MIRANDA)", "descripcion" => "", "activo" => 1, "estado_id" => 13, "municipio_id" => 179, "parroquia_id" => 613,]);
            DB::table("infocentros")->insert([ "mir" => "MIR06", "nombre_infocentro" => "CASA DE LA CULTURA BARUTA", "descripcion" => "", "activo" => 1, "estado_id" => 13, "municipio_id" => 181, "parroquia_id" => 617,]);
            DB::table("infocentros")->insert([ "mir" => "MIR07", "nombre_infocentro" => "B. P. RAUL LEONI", "descripcion" => "ATENDIDO POR EL PERSONAL DE LA BIBLIOTECA", "activo" => 1, "estado_id" => 13, "municipio_id" => 181, "parroquia_id" => 618,]);
            DB::table("infocentros")->insert([ "mir" => "MIR08", "nombre_infocentro" => "GAMELOTAL", "descripcion" => "", "activo" => 1, "estado_id" => 13, "municipio_id" => 167, "parroquia_id" => 581,]);
            DB::table("infocentros")->insert([ "mir" => "MIR09", "nombre_infocentro" => "BUROZ", "descripcion" => "", "activo" => 1, "estado_id" => 13, "municipio_id" => 185, "parroquia_id" => 623,]);
            DB::table("infocentros")->insert([ "mir" => "MIR10", "nombre_infocentro" => "PUEBLO LOS VELASQUEZ", "descripcion" => "PROBLEMAS DE EQUIPOS E INFRAESTRUCTURA", "activo" => 1, "estado_id" => 13, "municipio_id" => 185, "parroquia_id" => 623,]);
            DB::table("infocentros")->insert([ "mir" => "MIR11", "nombre_infocentro" => "CENTRO DE INFORMACIÓN BOLIVARIANO EPOIMA", "descripcion" => "", "activo" => 1, "estado_id" => 13, "municipio_id" => 182, "parroquia_id" => 620,]);
            DB::table("infocentros")->insert([ "mir" => "MIR12", "nombre_infocentro" => "INFOCENTRO ALBA", "descripcion" => "", "activo" => 1, "estado_id" => 13, "municipio_id" => 183, "parroquia_id" => 621,]);
            DB::table("infocentros")->insert([ "mir" => "MIR13", "nombre_infocentro" => "MEGAUNEFA (CHUAO)", "descripcion" => "NO TIENE FACILITADOR", "activo" => 1, "estado_id" => 13, "municipio_id" => 183, "parroquia_id" => 621,]);
            DB::table("infocentros")->insert([ "mir" => "MIR14", "nombre_infocentro" => "27 DE NOVIEMBRE (LA CARLOTA)", "descripcion" => "SE ENCUENTRA EN REMODELACI?N", "activo" => 1, "estado_id" => 13, "municipio_id" => 183, "parroquia_id" => 621,]);
            DB::table("infocentros")->insert([ "mir" => "MIR15", "nombre_infocentro" => "BP RAFAEL VICENTE EGUI", "descripcion" => "", "activo" => 1, "estado_id" => 13, "municipio_id" => 177, "parroquia_id" => 610,]);
            DB::table("infocentros")->insert([ "mir" => "MIR16", "nombre_infocentro" => "EL HATILLO(UNIDAD DE ATENCIÓN INTEGRAL YAKUYAUERA", "descripcion" => "NO TIENE FACILITADOR", "activo" => 1, "estado_id" => 13, "municipio_id" => 184, "parroquia_id" => 622,]);
        } catch (Exception $ex) {
            if ($ex->getCode() == 23505) {
                echo "Registros ya existentes ";
            } else {
                echo "Error: {$ex->getMessage()} ";
            }
        }
    }

}
