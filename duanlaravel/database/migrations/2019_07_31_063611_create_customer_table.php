<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('last_name', 255);
            $table->string('first_name', 255);
            $table->string('email', 191);
            $table->string('company', 191);
            $table->string('phone', 191);
            $table->string('adress1', 255);
            $table->string('adress2', 255);
            $table->string('city', 255);
            $table->string('state', 255);
            $table->string('postal_code', 255);
            $table->string('country', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
