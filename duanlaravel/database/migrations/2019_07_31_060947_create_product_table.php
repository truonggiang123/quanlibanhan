<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_code', 50);
            $table->string('product_name', 500);
            $table->text('description');
            $table->text('image');
            $table->decimal('standar_cost', 19, 4);
            $table->decimal('list_price', 19, 4);
            $table->string('quantity_per_unit', 50);
            $table->tinyInteger('discontinue');
            $table->float('discount');


            //khoa ngoai
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->integer('suppliers_id')->unsigned();
            $table->foreign('suppliers_id')->references('id')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
