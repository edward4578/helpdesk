<?php

use Illuminate\Database\Seeder;

class create_beneficiario_seeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //
        try {
            DB::table('beneficiario')->insert([
                'cedula' => '14748547',
                'nombres' => 'Pepito',
                'apellidos' => '¨Pregunton',
                'email' => 'pepitopregunton@gmail.com',
                'telefono' => '02128477447',
                'direccion' => 'La Palomera',
                'parroquia_id' => 617,
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
