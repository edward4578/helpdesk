<?php

use Illuminate\Database\Seeder;

class EstatusSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //
        try {
            DB::table('estatus')->insert(['estatus' => 'Pendiente']);
            DB::table('estatus')->insert(['estatus' => 'Procesado']);
            DB::table('estatus')->insert(['estatus' => 'Cancelado']);
        } catch (Exception $ex) {
            if ($ex->getCode() == 23505) {
                echo "Registros ya existentes ";
            } else {
                echo "Error: {$ex->getMessage()} ";
            }
        }
    }

}
