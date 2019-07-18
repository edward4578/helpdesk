<?php

use Illuminate\Database\Seeder;

class CanaimaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        try {
            DB::table('canaima')->insert(['modelo' => 'MG10T']);
            DB::table('canaima')->insert(['modelo' => 'MG10T2']);
            DB::table('canaima')->insert(['modelo' => 'MGED']);
            DB::table('canaima')->insert(['modelo' => 'MAGALHAES 5 CANAIMA XL']);
            DB::table('canaima')->insert(['modelo' => 'MAGALHAES MG3 CANAIMA XL']);
            DB::table('canaima')->insert(['modelo' => 'Canaima Docente VIT D2100']);
            DB::table('canaima')->insert(['modelo' => 'Canaima Docente VIT M2400']);
        } catch (Exception $ex) {
            if ($ex->getCode() == 23505) {
                echo "Registros ya existentes ";
            } else {
                echo "Error: {$ex->getMessage()} ";
            }
        }
    }
}
