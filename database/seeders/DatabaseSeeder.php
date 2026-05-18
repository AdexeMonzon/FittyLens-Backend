<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Crear usuarios de prueba aleatorios
        User::factory(14)->create();

        // 2. Crear el Test User principal
        User::factory()->create([
            'name' => 'Fitty User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // 3. Ejecutar los seeders en orden de dependencia
        $this->call([
            IntoleranceSeeder::class,
            ProductSeeder::class,
            RecipeSeeder::class,
            UserIntoleranceSeeder::class,
            UserFavoriteProductSeeder::class,
            UserFavoriteRecipeSeeder::class,
            UserBarcodeSearchSeeder::class,
        ]);
    }
}
