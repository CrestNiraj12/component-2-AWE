<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentHasProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_has_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("payment_id");
            $table->unsignedBigInteger("product_id");
            $table->unique(["payment_id", "product_id"]);
            $table->integer("quantity", false, true);
            $table->foreign("payment_id")->references("id")->on("payments")->onDelete('cascade');
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
        Schema::dropIfExists('payment_has_products');
    }
}
