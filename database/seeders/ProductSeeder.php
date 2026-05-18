<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'barcode' => '8410026102341',
                'name' => 'Bebida de Avena Sin Gluten',
                'brand' => 'Alpro',
                'ingredients' => 'Agua, avena sin gluten (10%), fibra de raíz de achicoria, aceite de girasol, carbonato de calcio, sal marina.',
                'allergens' => [],
                'image_url' => 'https://images.unsplash.com/photo-1579954115545-a95591f28bfc?w=500',
                'nutriscore' => 'A',
            ],
            [
                'barcode' => '8480000123456',
                'name' => 'Leche Semidesnatada Sin Lactosa',
                'brand' => 'Hacendado',
                'ingredients' => 'Leche semidesnatada de vaca, lactasa y vitaminas A, D y E.',
                'allergens' => [],
                'image_url' => 'https://images.unsplash.com/photo-1550583724-b2692b85b150?w=500',
                'nutriscore' => 'B',
            ],
            [
                'barcode' => '8410012010121',
                'name' => 'Pan de Molde Blanco',
                'brand' => 'Bimbo',
                'ingredients' => 'Harina de trigo, agua, levadura, azúcar, aceite vegetal (girasol), sal, emulgentes, conservadores.',
                'allergens' => ['gluten'],
                'image_url' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?w=500',
                'nutriscore' => 'C',
            ],
            [
                'barcode' => '8410020023010',
                'name' => 'Yogur Griego Natural',
                'brand' => 'Danone',
                'ingredients' => 'Leche pasturizada, nata, leche en polvo desnatada y fermentos lácticos.',
                'allergens' => ['lactosa'],
                'image_url' => 'https://images.unsplash.com/photo-1488477181946-6428a0291777?w=500',
                'nutriscore' => 'B',
            ],
            [
                'barcode' => '8410069018521',
                'name' => 'Chocolate Negro 85% con Almendras',
                'brand' => 'Valor',
                'ingredients' => 'Pasta de cacao, almendras troceadas (15%), cacao desgrasado en polvo, manteca de cacao, edulcorante, emulgente (lecitina de soja).',
                'allergens' => ['frutos secos', 'soja'],
                'image_url' => 'https://images.unsplash.com/photo-1549007994-cb92ca87df46?w=500',
                'nutriscore' => 'D',
            ],
            [
                'barcode' => '8480000456123',
                'name' => 'Pechuga de Pollo Fileteada',
                'brand' => 'Mercadona',
                'ingredients' => 'Pechuga de pollo fresca 100%. Sin aditivos.',
                'allergens' => [],
                'image_url' => 'https://images.unsplash.com/photo-1604503468506-a8da13d82791?w=500',
                'nutriscore' => 'A',
            ],
            [
                'barcode' => '8430012908761',
                'name' => 'Calabacín Fresco Ecológico',
                'brand' => 'Huerta Bio',
                'ingredients' => 'Calabacín fresco procedente de agricultura ecológica.',
                'allergens' => [],
                'image_url' => 'https://images.unsplash.com/photo-1592924357228-91a4daadcfea?w=500',
                'nutriscore' => 'A',
            ],
            [
                'barcode' => '4901515120350',
                'name' => 'Salsa de Soja Tradicional',
                'brand' => 'Kikkoman',
                'ingredients' => 'Agua, soja, trigo, sal.',
                'allergens' => ['soja', 'gluten'],
                'image_url' => 'https://images.unsplash.com/photo-1607330289024-1535c6b4e1c1?w=500',
                'nutriscore' => 'D',
            ],
            [
                'barcode' => '8410080010047',
                'name' => 'Atún Claro en Aceite de Oliva',
                'brand' => 'Calvo',
                'ingredients' => 'Atún claro, aceite de oliva y sal.',
                'allergens' => ['pescado'],
                'image_url' => 'https://images.unsplash.com/photo-1534604973900-c43ab4c2e0ab?w=500',
                'nutriscore' => 'B',
            ],
        ];

        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }
    }
}
