<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class CategoryFactory extends Factory
{

    protected $model = Category::class;

    public function definition()
    {
        $name = $this->faker->unique()->name();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Category $category) {
            $category->subcategories()->createMany(
                Subcategory::factory()->count(10)->make()->toArray()
            );
        });
    }
}
