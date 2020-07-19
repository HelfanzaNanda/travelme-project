<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->unsigned();
            $table->string('number_plate', '11')->unique();
            $table->string('name');
            $table->text('photo')->nullable();
            $table->string('facility', '50');
            $table->integer('seat')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
