<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserIntoleranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::all();
        $intolerances = \App\Models\Intolerance::all();

        if ($users->isEmpty() || $intolerances->isEmpty()) {
            return;
        }

        $severities = ['baja', 'media', 'alta'];

        // El primer usuario (Test User) tiene intolerancia severa al Gluten y media a la Lactosa
        $testUser = $users->first();
        $gluten = $intolerances->where('name', 'Gluten')->first();
        $lactosa = $intolerances->where('name', 'Lactosa')->first();

        if ($gluten) {
            $testUser->intolerances()->attach($gluten->id, [
                'severity' => 'alta',
                'notes' => 'Celiaquía severa diagnosticada en 2024. Evitar cualquier traza o contaminación cruzada.',
            ]);
        }

        if ($lactosa) {
            $testUser->intolerances()->attach($lactosa->id, [
                'severity' => 'media',
                'notes' => 'Provoca molestias estomacales moderadas. Consumir lácteos solo si contienen lactasa.',
            ]);
        }

        // Asignar intolerancias aleatorias a otros usuarios de prueba
        foreach ($users->skip(1)->take(5) as $user) {
            $randomIntolerances = $intolerances->random(rand(1, 2));
            foreach ($randomIntolerances as $intolerance) {
                $user->intolerances()->attach($intolerance->id, [
                    'severity' => $severities[array_rand($severities)],
                    'notes' => 'Notas de control de alérgenos.',
                ]);
            }
        }
    }
}
