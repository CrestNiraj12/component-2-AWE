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
            "description" => $this->faker->paragraph(),
            "image" => $this->faker->unique()->imageUrl(640, 480, $category->title),
            "price" => $this->faker->randomDigit(),
            "units" => $this->faker->randomDigit(),
            "data" => $this->faker->numberBetween(45, 200),
            "product_category_id" => $category->id,
            "user_id" => User::whereHas("roles", function ($q) {
                $q->whereJsonContains("permissions->create-product", true);
            })->inRandomOrder()->first()->id
        ];
    }
}
