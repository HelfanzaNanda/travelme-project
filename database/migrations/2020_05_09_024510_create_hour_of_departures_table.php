<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHourOfDeparturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hour_of_departures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->unsigned();
            $table->integer('date_id')->unsigned();
            $table->time('hour');
            $table->integer('seat');
            $table->integer('remaining_seat');
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('CASCADE');
            $table->foreign('date_id')->references('id')->on('date_of_departures')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hour_of_departures');
    }
}
