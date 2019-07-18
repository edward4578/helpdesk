<?php

use Illuminate\Database\Seeder;

class FallasTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        try {
            DB::table('fallas')->insert([
                'falla' => 'No tiene los iconos del escritorio.',
            ]);
            DB::table('fallas')->insert([
                'falla' => 'No reconoce el ratón táctil.',
            ]);
            DB::table('fallas')->insert([
                'falla' => 'Hay que presionar duro el teclado o las teclas al escribir se repiten.',
            ]);
            DB::table('fallas')->insert([
                'falla' => 'No tiene sonido o no se escucha.',
            ]);
            DB::table('fallas')->insert([
                'falla' => 'No tiene sonido o no se escucha. Instalé el Contenido de 3er Grado pero no me aparece el Icono, (Sirve también para encontrar iconos de 2do y 4to Grado).',
            ]);
            DB::table('fallas')->insert([
                'falla' => 'Al Presionar algunas teclas aparecen numeros en lugar de las letras. Letras e Iconos con tamanos desproporcionados (o muy pequenos o muy grandes)',
            ]);
            DB::table('fallas')->insert([
                'falla' => 'Claves de las Canaima (Pruebe con alguna de estas 2 opciones).',
            ]);
            DB::table('fallas')->insert([
                'falla' => 'Tiene la Pantalla Gigante y no logra ver nada.',
            ]);
            DB::table('fallas')->insert([
                'falla' => 'Coloqué una clave pero no la recuerdo.',
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
