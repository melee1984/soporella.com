<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTmpShoppingCartDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmp_shopping_cart__details', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('tmp_shopping_cart')->unsigned()->nullable();
            $table->foreign('tmp_shopping_cart')->references('id')->on('tmp_shopping_cart')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->bigInteger('attraction_id')->unsigned()->nullable();
            
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
        Schema::dropIfExists('tmp_shopping_cart__details');
    }
}
