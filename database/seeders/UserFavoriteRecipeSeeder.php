<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserFavoriteRecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::all();
        $recipes = \App\Models\Recipe::all();

        if ($users->isEmpty() || $recipes->isEmpty()) {
            return;
        }

        // Test User tiene la receta de pollo y calabacín en favoritos
        $testUser = $users->first();
        $recetaPollo = $recipes->where('title', 'Cena Ligera de Pollo y Calabacín')->first();

        if ($recetaPollo) {
            $testUser->favoriteRecipes()->attach($recetaPollo->id);
        }

        // Favoritos para otros usuarios
        foreach ($users->skip(1)->take(5) as $user) {
            $randomRecipes = $recipes->random(rand(1, $recipes->count()));
            foreach ($randomRecipes as $recipe) {
                $user->favoriteRecipes()->attach($recipe->id);
            }
        }
    }
}
