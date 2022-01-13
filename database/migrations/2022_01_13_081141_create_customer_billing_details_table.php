<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerBillingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_billing_details', function (Blueprint $table) {
            $table->id();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("email");
            $table->string("phone");
            $table->string("company")->nullable();
            $table->string("address_1");
            $table->string("address_2");
            $table->string("city");
            $table->string("postal_code");
            $table->string("country");
            $table->string("state");
            $table->unsignedBigInteger("payment_id");
            $table->foreign("payment_id")->references("id")->on("payments")->onDelete('cascade');
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
        Schema::dropIfExists('customer_billing_details');
    }
}
