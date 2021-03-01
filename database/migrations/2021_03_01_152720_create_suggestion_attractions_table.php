<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuggestionAttractionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggestion_attractions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('attraction_id')->unsigned()->nullable();
            $table->foreign('attraction_id')->references('id')->on('attractions')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->tinyInteger('sorting')->nullable();
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
        Schema::dropIfExists('suggestion_attractions');
    }
}
