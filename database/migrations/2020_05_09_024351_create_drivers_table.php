<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->unsigned();
            $table->integer('car_id')->unsigned();
            $table->char('nik','16')->unique();
            $table->char('sim', '16')->unique();
            $table->string('name', '50');
            $table->enum('gender', ['m', 'f']);
            $table->string('email', '30')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password');
            $table->text('avatar')->nullable();
            $table->text('address');
            $table->string('telephone', '13');
            $table->string('api_token', 80)->unique()->nullable()->default(null);
            $table->rememberToken();
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('car_id')->references('id')->on('cars')->onDelete('CASCADE');
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
        Schema::dropIfExists('drivers');
    }
}
