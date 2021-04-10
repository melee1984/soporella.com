<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttractionLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attraction_language', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('attraction_id')->unsigned()->nullable();
            $table->foreign('attraction_id')->references('id')->on('attractions')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->string('language_code', 5)->nullable();
            $table->string('title', 150)->nullable();
            $table->string('photo', 50)->nullable();
            $table->string('short_description'. 250)->nullable();
            $table->text('description')->nullable();
            $table->text('availability')->nullable();
            $table->text('redemption')->nullable();
            $table->text('policy')->nullable();
            $table->text('about')->nullable();
            $table->text('video')->nullable();
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
        Schema::dropIfExists('attraction_language');
    }
}
