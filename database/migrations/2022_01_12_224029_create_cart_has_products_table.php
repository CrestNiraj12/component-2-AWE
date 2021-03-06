<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartHasProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_has_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("cart_id");
            $table->unsignedBigInteger("product_id");
            $table->unique(["cart_id", "product_id"]);
            $table->integer("quantity", false, true);
            $table->foreign("cart_id")->references("id")->on("carts")->onDelete('cascade');
            $table->foreign("product_id")->references("id")->on("products")->onDelete('cascade');
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
        Schema::dropIfExists('cart_has_products');
    }
}
