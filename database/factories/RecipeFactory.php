<?php

namespace Database\Factories;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(4, true),
            'description' => $this->faker->sentence(),
            'instructions' => "1. " . $this->faker->sentence() . "\n2. " . $this->faker->sentence() . "\n3. " . $this->faker->sentence(),
            'prep_time' => $this->faker->numberBetween(10, 60),
            'difficulty' => $this->faker->randomElement(['fácil', 'medio', 'difícil']),
            'image_url' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=500',
            'ingredients' => [
                ['name' => $this->faker->word(), 'amount' => $this->faker->numberBetween(50, 200) . 'g'],
                ['name' => $this->faker->word(), 'amount' => '1 unidad'],
            ],
            'allergens' => $this->faker->randomElements(['gluten', 'lactosa', 'frutos secos'], rand(0, 1)),
            'is_ai_generated' => $this->faker->boolean(),
            'search_query' => $this->faker->word(),
        ];
    }
}
