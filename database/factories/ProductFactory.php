<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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

            'name'=>fake()->words(2,true),
            'SKU'=>fake()->unique()->bothify('????-####'),
            'stock'=>fake()->numberBetween(0,500),
            'price'=>fake()->randomFloat(2,10.0, 1000),
            'alert_threshold'=>fake()->numberBetween(2,100),
        ];
    }
}

