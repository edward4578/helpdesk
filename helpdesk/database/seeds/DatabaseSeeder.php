<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->call(EstadoTableSeeder::class);
        $this->call(MunicipioTableSeeder::class);
        $this->call(ParroquiaTableSeeder::class);
        $this->call(InfocentrosTableSeeder::class);
        $this->call(CanaimaSeeder::class);
        $this->call(EstatusSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(SolucionTableSeeder::class);
        $this->call(FallasTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(create_beneficiario_seeder::class);
        $this->call(create_beneficiario_x_canaima_seeder::class);
    }

}
