<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\SubCategory;
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
            'name' => $this->faker->name,
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'description' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(),
            'active' => $this->faker->boolean,
            'quantity' => $this->faker->randomNumber(),
            'category_id' => 5,
            'sub_category_id' => 5,
        ];
    }
}
