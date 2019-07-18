<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        try {
            DB::table('rol')->insert([
                'rol' => 'Director',
            ]);
            DB::table('rol')->insert([
                'rol' => 'Facilitador',
            ]);
            DB::table('rol')->insert([
                'rol' => 'Tècnico',
            ]);
            DB::table('rol')->insert([
                'rol' => 'Secretaria',
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
