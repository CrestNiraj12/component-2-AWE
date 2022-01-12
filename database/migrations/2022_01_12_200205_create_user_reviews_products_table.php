<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserReviewsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_reviews_products', function (Blueprint $table) {
            $table->id();
            $table->integer("rating");
            $table->longText("comment");
            $table->unsignedBigInteger("product_id");
            $table->unsignedBigInteger("user_id");
            $table->foreign("product_id")->references("id")->on("products");
            $table->foreign("user_id")->references("id")->on("users")->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_reviews_products');
    }
}
