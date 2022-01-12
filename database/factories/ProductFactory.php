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
        $category = ProductCategory::inRandomOrder()->first();

        return [
            "title" => $this->faker->text(50),
            "description" => $this->faker->paragraph(50),
            "image" => $category->image,
            "price" => $this->faker->numberBetween(10, 100),
            "units" => $this->faker->randomDigit(),
            "data" => $this->faker->numberBetween(45, 200),
            "product_category_id" => $category->id,
            "user_id" => User::whereHas("roles", function ($q) {
                $q->whereJsonContains("permissions->create-product", true);
            })->inRandomOrder()->first()->id
        ];
    }
}
