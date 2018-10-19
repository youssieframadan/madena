<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresses', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('store_id')->unsigned();
            $table->foreign('store_id')->references('id')->on('stores');

            $table->Integer('governorate_id')->unsigned();
            $table->foreign('governorate_id')->references('id')->on('governorates');
            
            $table->Integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities');

            $table->string('street');
            $table->string('block_no');
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
        Schema::dropIfExists('adresses');
    }
}
