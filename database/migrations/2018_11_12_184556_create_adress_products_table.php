<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdressProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adress_products', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('adress_id')->unsigned();
            $table->foreign('adress_id')->references('id')->on('adresses');

            $table->Integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');

            $table->string('product_status');
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
        Schema::dropIfExists('adress_products');
    }
}
