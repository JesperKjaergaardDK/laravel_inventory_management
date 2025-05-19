<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StorageItem>
 */
class StorageItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_name' => fake()->word(),
            'price' => fake() -> numberBetween(100, 10000),
            'quantity' => fake() -> numberBetween(1, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
