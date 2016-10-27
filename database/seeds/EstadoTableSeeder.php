<?php

use Illuminate\Database\Seeder;

class EstadoTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        try {
            DB::table("estado")->insert([ "estado" => "DTTO. CAPITAL"]);
            DB::table("estado")->insert([ "estado" => "ANZOATEGUI"]);
            DB::table("estado")->insert([ "estado" => "APURE"]);
            DB::table("estado")->insert([ "estado" => "ARAGUA"]);
            DB::table("estado")->insert([ "estado" => "BARINAS"]);
            DB::table("estado")->insert([ "estado" => "BOLIVAR"]);
            DB::table("estado")->insert([ "estado" => "CARABOBO"]);
            DB::table("estado")->insert([ "estado" => "COJEDES"]);
            DB::table("estado")->insert([ "estado" => "FALCON"]);
            DB::table("estado")->insert([ "estado" => "GUARICO"]);
            DB::table("estado")->insert([ "estado" => "LARA"]);
            DB::table("estado")->insert([ "estado" => "MERIDA"]);
            DB::table("estado")->insert([ "estado" => "MIRANDA"]);
            DB::table("estado")->insert([ "estado" => "MONAGAS"]);
            DB::table("estado")->insert([ "estado" => "NUEVA ESPARTA"]);
            DB::table("estado")->insert([ "estado" => "PORTUGUESA"]);
            DB::table("estado")->insert([ "estado" => "SUCRE"]);
            DB::table("estado")->insert([ "estado" => "TACHIRA"]);
            DB::table("estado")->insert([ "estado" => "TRUJILLO"]);
            DB::table("estado")->insert([ "estado" => "YARACUY"]);
            DB::table("estado")->insert([ "estado" => "ZULIA"]);
            DB::table("estado")->insert([ "estado" => "AMAZONAS"]);
            DB::table("estado")->insert([ "estado" => "DELTA AMACURO"]);
            DB::table("estado")->insert([ "estado" => "VARGAS"]);
        } catch (Exception $ex) {
            if ($ex->getCode() == 23505) {
                echo "Registros ya existentes ";
            } else {
                echo "Error: {$ex->getMessage()} ";
            }
        }
    }

}
