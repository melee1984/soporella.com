<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryAttractionMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_attraction_mapping', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('attraction_id')->unsigned()->nullable();
            $table->foreign('attraction_id')->references('id')->on('attractions')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->bigInteger('category_id')->unsigned()->nullable();
            // $table->foreign('category_id')->references('id')->on('category')->onUpdate('RESTRICT')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        // Schema::table('category_attraction_mapping', function(Blueprint $table)
        // {
        //     $table->dropForeign('category_attraction_mapping_attraction_id_foreign');
        //     // $table->dropForeign('category_attraction_mapping_category_id_foreign');
        // });

        Schema::dropIfExists('category_attraction_mapping');

    }
}
