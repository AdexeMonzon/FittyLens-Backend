<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Receta Híbrida generada por IA (Caché Hit)
        $recipe1 = \App\Models\Recipe::create([
            'title' => 'Cena Ligera de Pollo y Calabacín',
            'description' => 'Una cena rápida, saludable y baja en calorías, ideal para una digestión ligera.',
            'instructions' => "1. Cortar el calabacín en rodajas finas o tiras.\n2. En una sartén con unas gotas de aceite de oliva, dorar la pechuga de pollo a la plancha por ambos lados.\n3. Añadir el calabacín a la misma sartén y saltear hasta que esté tierno.\n4. Servir caliente con un toque de sal y pimienta.",
            'prep_time' => 15,
            'difficulty' => 'fácil',
            'image_url' => 'https://images.unsplash.com/photo-1604503468506-a8da13d82791?w=500',
            'ingredients' => [
                ['name' => 'Pechuga de Pollo', 'amount' => '200g'],
                ['name' => 'Calabacín Ecológico', 'amount' => '1 unidad'],
                ['name' => 'Aceite de oliva', 'amount' => '1 cucharada'],
                ['name' => 'Sal y pimienta', 'amount' => 'al gusto'],
            ],
            'allergens' => [],
            'is_ai_generated' => true,
            'search_query' => 'pollo calabacin cena',
        ]);

        // Buscar los productos reales en supermercado que son 100% seguros y recomendados
        $pollo = \App\Models\Product::where('barcode', '8480000456123')->first();
        $calabacin = \App\Models\Product::where('barcode', '8430012908761')->first();

        if ($pollo) {
            $recipe1->products()->attach($pollo->id);
        }
        if ($calabacin) {
            $recipe1->products()->attach($calabacin->id);
        }

        // 2. Receta Tradicional (con alérgenos comunes como gluten y lactosa)
        $recipe2 = \App\Models\Recipe::create([
            'title' => 'Tostas Rápidas de Atún',
            'description' => 'Un aperitivo o cena rápida con atún de calidad y pan crujiente.',
            'instructions' => "1. Tostar las rebanadas de pan de molde.\n2. Escurrir el atún claro en aceite de oliva y repartirlo sobre las tostadas.\n3. Opcional: añadir un toque de mayonesa u orégano por encima.\n4. Servir al instante.",
            'prep_time' => 5,
            'difficulty' => 'fácil',
            'image_url' => 'https://images.unsplash.com/photo-1541532713592-79a0317b6b77?w=500',
            'ingredients' => [
                ['name' => 'Pan de Molde Bimbo', 'amount' => '2 rebanadas'],
                ['name' => 'Atún Claro Calvo', 'amount' => '1 lata'],
            ],
            'allergens' => ['gluten', 'lactosa', 'pescado'],
            'is_ai_generated' => false,
            'search_query' => 'atun pan rapido',
        ]);

        $pan = \App\Models\Product::where('barcode', '8410012010121')->first();
        $atun = \App\Models\Product::where('barcode', '8410080010047')->first();

        if ($pan) {
            $recipe2->products()->attach($pan->id);
        }
        if ($atun) {
            $recipe2->products()->attach($atun->id);
        }
    }
}
