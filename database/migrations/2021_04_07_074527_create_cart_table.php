<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->string('session_id', 250)->nullable();
            $table->string('fullname', 150)->nullable();
            $table->string('mobile', 30)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('ref_no', 20)->nullable();
            $table->boolean('active');
            $table->string('ip_address', 50)->nullable();

            $table->timestamp('processed_at')->nullable();
            $table->timestamp('submitted_at')->nullable();

            $table->bigInteger('payment_id')->unsigned()->nullable();
            $table->string('sms_code', 10)->nullable();
            $table->double('amount', 8, 2)->nullable();
            $table->string('currency', 4)->nullable();
            $table->string('discount_code', 10)->nullable();
            
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
        Schema::dropIfExists('cart');
    }
}
