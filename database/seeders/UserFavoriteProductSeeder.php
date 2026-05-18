<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserFavoriteProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::all();
        $products = \App\Models\Product::all();

        if ($users->isEmpty() || $products->isEmpty()) {
            return;
        }

        // Test User tiene de favoritos la Bebida de Avena Sin Gluten y la Leche Semidesnatada Sin Lactosa
        $testUser = $users->first();
        $avena = $products->where('barcode', '8410026102341')->first();
        $leche = $products->where('barcode', '8480000123456')->first();

        if ($avena) {
            $testUser->favoriteProducts()->attach($avena->id, [
                'notes' => 'Mi bebida favorita para el café por las mañanas, súper digestiva.',
            ]);
        }

        if ($leche) {
            $testUser->favoriteProducts()->attach($leche->id, [
                'notes' => 'Para cocinar y hacer repostería segura.',
            ]);
        }

        // Favoritos para otros usuarios
        foreach ($users->skip(1)->take(5) as $user) {
            $randomProducts = $products->random(rand(1, 3));
            foreach ($randomProducts as $product) {
                $user->favoriteProducts()->attach($product->id, [
                    'notes' => 'Producto básico recomendado en la app.',
                ]);
            }
        }
    }
}
