<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttractionImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attraction_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('attraction_id')->unsigned()->nullable();
            $table->foreign('attraction_id')->references('id')->on('attractions')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->string('img', 50)->nullable();
            $table->tinyInteger('sorting')->default(0)->nullable();
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
        Schema::dropIfExists('attraction_images');
    }
}
