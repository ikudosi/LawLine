<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function ($table) {
            $table->increments('product_id');
            $table->integer('user_id')->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->string('name')->index('name');
            $table->longText('description');
            $table->decimal('price', 15, 2)->index('price');
            $table->text('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
