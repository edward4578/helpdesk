<?php

use Illuminate\Database\Seeder;

class create_beneficiario_x_canaima_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         try {
            DB::table('beneficiario_x_canaima')->insert([
                'serial_canaima' => '454DS5FDFD55',
                'descripcion' => 'esta rayada',
                'beneficiario_id' => 1,
                'canaima_id' => 1,
                ]);

        } catch (Exception $ex) {
            if ($ex->getCode() == 23505) {
                echo "Registros ya existentes ";
            } else {
                echo "Error: {$ex->getMessage()} ";
            }
        }
    }
}
