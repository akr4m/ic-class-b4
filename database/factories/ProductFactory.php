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
            'name' => $this->faker->unique()->words(nb: 3, asText: true),
            'price_cents' => $this->faker->numberBetween(199, 9999),
            'stock' => $this->faker->numberBetween(0, 100),
        ];
    }
}
