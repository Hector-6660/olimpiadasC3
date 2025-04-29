<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResultadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Resultado::truncate();
        foreach (self::$resultados as $resultado) {
            \App\Models\Resultado::create([
                'resultado' => $resultado['resultado'],
            ]);
        }
    }

    private static $resultados = array();
}
