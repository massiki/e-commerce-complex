<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $name = fake()->unique()->words(3, true);

        return [
            'category_id' => Category::inRandomOrder()->first()?->id,
            'brand_id' => Brand::inRandomOrder()->first()?->id,
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->paragraphs(3, true),
            'price' => fake()->randomFloat(2, 10000, 10000000),
            'stock' => fake()->numberBetween(0, 100),
            'rating' => fake()->randomFloat(1, 1, 5),
        ];
    }
}
