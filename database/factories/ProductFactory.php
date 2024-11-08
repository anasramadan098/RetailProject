<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'description' => $this->faker->paragraph,
            'main_image' => 'product_1.jpg',
            'category_id' => $this->faker->numberBetween(1, 5),
            'sku' => $this->faker->randomFloat( 2, 10, 100),
            'options' => json_encode([
                $this->faker->numberBetween(1, 5) , $this->faker->numberBetween(1, 5) , $this->faker->numberBetween(1, 5), $this->faker->numberBetween(1, 5), $this->faker->numberBetween(1, 5)
            ]),
            'stock' => $this->faker->numberBetween(1, 100),
            'discount' => $this->faker->numberBetween( 1, 100),
            'ribbon' => $this->faker->randomElement(['New', 'Best Seller', 'Sale']),
        ];
    }
}