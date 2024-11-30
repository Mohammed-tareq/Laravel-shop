<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $name = fake()->unique()->name();
        $slug = Str::slug($name);
        $category = [1,2,3,4];
        $categoryRandKey = array_rand($category);
        $subcategory = [1,2,3,4];
        $subcategoryRandKey = array_rand($subcategory);

        return [
            'name'=> $name,
            'slug' => $slug,
            'category_id' => $category[$categoryRandKey],
            'subcategory_id' => $subcategory[$subcategoryRandKey],
            'description' => fake()->text(),
            'price' => fake()->randomFloat(2, 100, 1000),
            'status' => fake()->randomElement(['active', 'closed']),
            'image' => fake()->imageUrl(),
            'qty' => fake()->numberBetween(1, 100),
            'isfeatured' => fake()->randomElement(['yes', 'no']),
            'sku' => fake()->unique()->ean13(),
            'brand_id' => 1,
            'trackqty' => fake()->randomElement(['yes', 'no']),
            'oldprice' => fake()->randomFloat(2, 100, 1000),
            'barcode' => fake()->ean13(),

            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
