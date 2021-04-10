<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 250);
            $table->text('description')->nullable();
            $table->bigInteger('attraction_id')->unsigned()->nullable();
            $table->foreign('attraction_id')->references('id')->on('attractions')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->tinyInteger('sorting')->nullable();
            $table->tinyInteger('active')->default(0);
            $table->tinyInteger('slider')->default(0);
            $table->string('img_1', 50)->nullable();
            $table->string('img_2', 50)->nullable();
            $table->string('large_img', 50)->nullable();
            $table->tinyInteger('display_option')->nullable();
            $table->string('discount_string', 250)->nullable();
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
        Schema::dropIfExists('campaigns');
    }
}
