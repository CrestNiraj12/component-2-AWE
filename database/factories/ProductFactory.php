<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->text(50),
            "description" => $this->faker->paragraph(),
            "image" => "https://picsum.photos/640/480",
            "price" => $this->faker->randomDigit(),
            "units" => $this->faker->randomDigit(),
            "data" => $this->faker->numberBetween(45, 200),
            "product_category_id" => ProductCategory::inRandomOrder()->first()->id,
            "user_id" => User::whereHas("roles", function ($q) {
                $q->whereJsonContains("permissions->create-product", true);
            })->inRandomOrder()->first()->id
        ];
    }
}