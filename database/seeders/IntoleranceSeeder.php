<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IntoleranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $intolerances = [
            [
                'name' => 'Gluten',
                'description' => 'Intolerancia al gluten o enfermedad celíaca. Afecta la digestión de trigo, cebada y centeno.',
            ],
            [
                'name' => 'Lactosa',
                'description' => 'Incapacidad para digerir el azúcar de la leche (lactosa) debido a la deficiencia de lactasa.',
            ],
            [
                'name' => 'Frutos Secos',
                'description' => 'Alergia severa a cacahuetes, almendras, nueces, avellanas u otros frutos de cáscara.',
            ],
            [
                'name' => 'Mariscos',
                'description' => 'Reacción alérgica a crustáceos y moluscos (gambas, langostinos, mejillones, etc.).',
            ],
            [
                'name' => 'Huevo',
                'description' => 'Sensibilidad o alergia a las proteínas de la clara o yema de huevo.',
            ],
            [
                'name' => 'Soja',
                'description' => 'Alergia común a los derivados de la legumbre de soja.',
            ],
            [
                'name' => 'Pescado',
                'description' => 'Alergia alimentaria a pescados blancos, azules u otras especies marinas.',
            ],
        ];

        foreach ($intolerances as $intolerance) {
            \App\Models\Intolerance::create($intolerance);
        }
    }
}
