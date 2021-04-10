<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttractionItemHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attraction_item_header', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('attraction_id')->unsigned()->nullable();
            $table->foreign('attraction_id')->references('id')->on('attractions')->onUpdate('RESTRICT')->onDelete('CASCADE');

             $table->string('banner_img', 250)->nullable();
             $table->string('title', 250)->nullable();
             $table->string('img', 250)->nullable();
                
            $table->tinyInteger('sorting')->default(0)->nullable();
            $table->boolean('active')->nullable();
            $table->tinyInteger('is_required')->default(0)->nullable();
            $table->tinyInteger('is_multiple')->default(0)->nullable();
            $table->text('description')->nullable();

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
        Schema::dropIfExists('attraction_item_header');
    }
}
