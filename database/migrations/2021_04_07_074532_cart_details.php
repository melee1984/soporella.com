<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CartDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_details', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('cart_id')->unsigned()->nullable();
            $table->foreign('cart_id')->references('id')->on('cart')->onUpdate('RESTRICT')->onDelete('CASCADE');
            
            $table->bigInteger('attraction_id')->unsigned()->nullable();
            $table->bigInteger('attraction_detail_id')->unsigned()->nullable();
            $table->double('sub_total', 8, 2)->default(0);
            $table->integer('total_qty')->default(0)->nullable();
            $table->text('variance_details');
            $table->double('variance_total', 8, 2)->default(0);
            $table->string('selected_date', 50);

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
        Schema::dropIfExists('cart_details');
    }
}
