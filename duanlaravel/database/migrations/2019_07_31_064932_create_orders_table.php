<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            //khoa ngoai 1
            $table->integer('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')->on('employees');
            //khoa ngoai 2
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->dateTime('order_day');
            $table->dateTime('shipped_day');
            $table->string('ship_name', 255);
            $table->string('ship_adress1', 255);
            $table->string('ship_adress2', 255);
            $table->string('ship_city', 255);
            $table->string('ship_state', 255);
            $table->string('ship_postal_code', 255);
            $table->string('ship_country', 255);
            $table->decimal('shipping_fee', 19, 4);
            $table->string('payment_type', 255);
            $table->dateTime('paid_date');
            $table->string('order_status', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
