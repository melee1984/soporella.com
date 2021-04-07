<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtttractionItemDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atttraction_item_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('attraction_rate_header_id')->unsigned()->nullable();
            $table->foreign('attraction_rate_header_id')->references('id')->on('attraction_item_header')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->string('title', 150)->nullable();
            $table->string('currency', 10)->nullable();
            $table->double('price', 8, 2)->default(0);
            $table->double('markdown_price', 8, 2)->default(0);
            $table->integer('qty')->default(0);
            $table->boolean('active')->default(0);
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
        Schema::dropIfExists('atttraction_item_details');
    }
}
