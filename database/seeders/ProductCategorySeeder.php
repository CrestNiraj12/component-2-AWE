<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cd = ProductCategory::create([
            'title' => 'CD',
            "data_type" => "mins",
            'image' => "https://media.istockphoto.com/photos/many-cds-on-white-background-picture-id597660044?k=20&m=597660044&s=612x612&w=0&h=l6YSRDO01m2WR34lt-6CdxeMOJ9EmRGdOsJHuhc0TG8="
        ]);

        $book = ProductCategory::create([
            'title' => 'Book',
            "data_type" => "pages",
            'image' => "https://media.istockphoto.com/photos/row-of-books-on-a-shelf-multicolored-book-spines-stack-in-the-picture-id1222550815?b=1&k=20&m=1222550815&s=170667a&w=0&h=MTxBeBrrrYtdlpzhMpD1edwLYQf3OPgkNeDEgIzYJww="
        ]);

        $game = ProductCategory::create([
            'title' => 'Game',
            "data_type" => "hours",
            'image' => "https://media.istockphoto.com/photos/gamer-work-space-concept-top-view-a-gaming-gear-mouse-keyboard-in-picture-id1170073824?k=20&m=1170073824&s=612x612&w=0&h=lQYUGw9IIqI9bsTrIrS8xCyId2PmmNYPSwB7UNEzssI="
        ]);
    }
}
