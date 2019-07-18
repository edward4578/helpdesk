<?php

use Illuminate\Database\Seeder;

class SolucionTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        try {
            DB::table('soluciones')->insert([
                'solucion' => 'Haga clic derecho en el ratón, pulse en Cambiar el fondo del escritorio, luego ingrese en la pestaña Interfaz y habilite donde dice Mostrar Iconos en los Menú, cierre y si es necesario reinicie el equipo.',
            ]);
            DB::table('soluciones')->insert([
                'solucion' => 'Presione Fin y F11, primero Fin y sin soltarlo presione F11, esta opción es para habilitar y deshabilitar el ratón táctil.',
            ]);
            DB::table('soluciones')->insert([
                'solucion' => 'Ingrese en Menú, Sistemas, Preferencias, Opciones de Teclado y pruebe con diferentes configuraciones, en la parte baja encontrara una herramienta de prueba de tecleo.',
            ]);
            DB::table('soluciones')->insert([
                'solucion' => 'Ingrese en el menú, Sistema, Administración, luego en Monitores Múltiples (OpciÃ³n solo disponible en algunos equipos), presiona clic izquierdo sobre el monitor que aparece y donde dice Modos cambia al modo 1024x600 y si siente que es muy pequeña coloca al menos 800x600',
            ]);
            DB::table('soluciones')->insert([
                'solucion' => 'Presione Fin y F3, primero Fin y sin soltarlo presione F3, esta opción es para habilitar y deshabilitar el sonido. Verifique que el icono similar a una bocina, no tenga nada ningún dibujo rojo sobre ella, el icono bocina está en la parte de abajo y a mano derecha del computador Canaima, una vez hecho esto presione, Fin + F5, para subir el volumen o Fin + F4 para bajarlo.',
            ]);
            DB::table('soluciones')->insert([
                'solucion' => 'Ingrese en Equipo, Sistema de Archivos, usr, share, contenidos educativos, luego de ingresar en la carpeta deberán aparecer las carpetas de 2do grado y de 3er grado. Ingresamos en la carpeta de 3er grado, una vez allá¬, debemos ubicar la carpeta index1.html, nos posicionamos sobre ellas con el cursor del ratÃ³n y hacemos clic derecho, seleccionamos crear enlace directo o crear enlace, una vez hecho esto copiamos el enlace y lo copiamos en la carpeta de documentos o en el escritorio. Luego hacemos clic derecho sobre él y seleccionamos abrir con y seleccionamos el navegador Mozilla Firefox para abrir este tipo de archivos y listo.',
            ]);
            DB::table('soluciones')->insert([
                'solucion' => 'Presione la tecla Fin y sin soltarla la tecla Ins o Num, que está en la parte superior a mano derecha y listo.',
            ]);
            DB::table('soluciones')->insert([
                'solucion' => 'Presione sobre el escritorio, es decir sobre la pantalla clic derecho y luego ingrese en cambiar fondo del escritorio, luego ingrese en tipografías y cambie todas las letras a sans 10 (opcional) o alguna otra pequeña que funcione, ingrese luego en detalles, allá¬ donde dice resoluciÃ³n debe estar en 80 puntos por pulgada.',
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
