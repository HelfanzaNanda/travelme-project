<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDateOfDeparturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('date_of_departures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->unsigned();
            $table->integer('departure_id')->unsigned();
            $table->date('date');
            //$table->timestamps();

            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('CASCADE');
            $table->foreign('departure_id')->references('id')->on('departures')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('date_of_departures');
    }
}
