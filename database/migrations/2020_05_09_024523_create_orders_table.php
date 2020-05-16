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
            $table->integer('user_id')->unsigned();
            $table->integer('owner_id')->unsigned();
            $table->integer('departure_id')->unsigned();
            $table->integer('driver_id')->unsigned()->nullable();
            $table->integer('car_id')->unsigned()->nullable();
            $table->date('date');
            $table->time('hour');
            $table->integer('price');
            $table->integer('total_price');
            $table->integer('total_seat');
            $table->string('pickup_location', '100');
            $table->string('destination_location', '100');
            $table->enum('status', ['0', '1', '2'])->default('1');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('CASCADE');
            $table->foreign('departure_id')->references('id')->on('departures')->onDelete('CASCADE');
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('CASCADE');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('CASCADE');
        });
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
