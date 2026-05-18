<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'barcode' => $this->faker->unique()->ean13(),
            'name' => $this->faker->words(3, true),
            'brand' => $this->faker->company(),
            'ingredients' => $this->faker->sentence(10),
            'allergens' => $this->faker->randomElements(['gluten', 'lactosa', 'frutos secos', 'soja'], rand(0, 2)),
            'image_url' => 'https://images.unsplash.com/photo-1542838132-92c53300491e?w=500',
            'nutriscore' => $this->faker->randomElement(['A', 'B', 'C', 'D', 'E']),
        ];
    }
}
