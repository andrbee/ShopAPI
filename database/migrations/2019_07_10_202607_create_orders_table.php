<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('order_status_id')->unsigned()->index();
            $table->foreign('order_status_id')->references('id')->on('order_statuses')->onDelete('cascade');

            $table->timestamps();
        });

//        Schema::table('orders', function($table) {
//
//            $table->foreign('order_status_id')->references('id')->on('order_statuses')->onDelete('cascade');
//        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
