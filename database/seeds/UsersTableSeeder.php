<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //
        try {
            DB::table('users')->insert([
                'name' => 'Katherin Rivaldo',
                'email' => 'katherin.Rivaldo@gmail.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'rol_id' => 1,
            ]);
            DB::table('users')->insert([
                'name' => 'Juan Molina',
                'email' => 'juan@gmail.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'rol_id' => 2,
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
