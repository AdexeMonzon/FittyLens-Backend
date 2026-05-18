<?php

namespace Database\Factories;

use App\Models\UserBarcodeSearch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<UserBarcodeSearch>
 */
class UserBarcodeSearchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'barcode' => $this->faker->ean13(),
            'product_name' => $this->faker->words(3, true),
            'is_match' => $this->faker->boolean(80), // 80% chance it is a safe product
            'scanned_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
