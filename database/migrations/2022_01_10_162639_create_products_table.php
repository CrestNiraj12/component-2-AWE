<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->longText("description");
            $table->string("image")->nullable();
            $table->decimal("price", 10, 2);
            $table->unsignedInteger("units");
            $table->integer("data");
            $table->unsignedBigInteger("product_category_id");
            $table->unsignedBigInteger("user_id");
            $table->foreign("product_category_id")->references("id")->on("product_categories");
            $table->foreign("user_id")->references("id")->on("users")->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
