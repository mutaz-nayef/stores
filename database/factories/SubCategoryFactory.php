<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategory>
 */
class SubCategoryFactory extends Factory
{


    protected $model = Subcategory::class;

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
        return $this->afterCreating(function (SubCategory $subcategory) {
            $subcategory->category()->associate(
                Category::factory()->create()
            )->save();
        });
    }
}
