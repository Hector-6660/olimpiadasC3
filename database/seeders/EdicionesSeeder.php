<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EdicionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::$ediciones as $edicion) {
            \App\Models\Edicion::create([
                'id' => $edicion['id'],
                'curso_escolar' => $edicion['curso_escolar'],
                'num_olimpiada' => $edicion['num_olimpiada'],
                'num_modding' => $edicion['num_modding'],
                'num_videojuegos' => $edicion['num_videojuegos'],
                'fecha_celebracion' => $edicion['fecha_celebracion'],
                'fecha_apertura' => $edicion['fecha_apertura'],
                'fecha_cierre' => $edicion['fecha_cierre'],
                'css_file' => $edicion['css_file']
            ]);
        }
    }

    private static $ediciones = array(
        array('id' => 1, 'curso_escolar' => 'primero', 'num_olimpiada' => 3, 'num_modding' => 2, 'num_videojuegos' => 6, 'fecha_celebracion' => '2023-01-01', 'fecha_apertura' => '2023-12-31', 'fecha_cierre' => '2024-01-15'),
        array('id' => 2, 'curso_escolar' => 'segundo', 'num_olimpiada' => 2, 'num_modding' => 4, 'num_videojuegos' => 5, 'fecha_celebracion' => '2023-01-01', 'fecha_apertura' => '2023-12-31', 'fecha_cierre' => '2024-01-15'),
        array('id' => 3, 'curso_escolar' => 'tercero', 'num_olimpiada' => 5, 'num_modding' => 3, 'num_videojuegos' => 7, 'fecha_celebracion' => '2023-01-01', 'fecha_apertura' => '2023-12-31', 'fecha_cierre' => '2024-01-15'),
        array('id' => 4, 'curso_escolar' => 'cuarto', 'num_olimpiada' => 1, 'num_modding' => 1, 'num_videojuegos' => 4, 'fecha_celebracion' => '2023-01-01', 'fecha_apertura' => '2023-12-31', 'fecha_cierre' => '2024-01-15'),
    );
}
