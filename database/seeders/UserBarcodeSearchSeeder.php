<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserBarcodeSearchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::all();

        if ($users->isEmpty()) {
            return;
        }

        $testUser = $users->first();

        // 1. Escaneo seguro para Test User (Bebida de Avena Sin Gluten)
        \App\Models\UserBarcodeSearch::create([
            'user_id' => $testUser->id,
            'barcode' => '8410026102341',
            'product_name' => 'Bebida de Avena Sin Gluten Alpro',
            'is_match' => true, // Seguro para celíacos (Gluten = alta)
            'scanned_at' => now()->subHours(2),
        ]);

        // 2. Escaneo peligroso para Test User (Pan de Molde Bimbo - contiene gluten)
        \App\Models\UserBarcodeSearch::create([
            'user_id' => $testUser->id,
            'barcode' => '8410012010121',
            'product_name' => 'Pan de Molde Blanco Bimbo',
            'is_match' => false, // PELIGRO: El usuario tiene intolerancia al Gluten
            'scanned_at' => now()->subDay(),
        ]);

        // 3. Escaneo seguro de chocolate negro (tiene frutos secos, pero el test user no es intolerante)
        \App\Models\UserBarcodeSearch::create([
            'user_id' => $testUser->id,
            'barcode' => '8410069018521',
            'product_name' => 'Chocolate Negro 85% con Almendras',
            'is_match' => true, // Seguro para él (no tiene intolerancia a frutos secos)
            'scanned_at' => now()->subDays(2),
        ]);

        // 4. Escaneo anónimo por parte de un visitante (Guest scan)
        \App\Models\UserBarcodeSearch::create([
            'user_id' => null,
            'barcode' => '8480000123456',
            'product_name' => 'Leche Semidesnatada Sin Lactosa Hacendado',
            'is_match' => true, // Por defecto verdadero al no haber perfil de usuario
            'scanned_at' => now()->subMinutes(30),
        ]);
    }
}
