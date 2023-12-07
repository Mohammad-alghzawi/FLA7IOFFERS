<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            // $table->float('total_price');
            $table->bigInteger('quantity');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedBigInteger('checkout_id');
            $table->foreign('checkout_id')->references('id')->on('checkouts');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');


            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
};