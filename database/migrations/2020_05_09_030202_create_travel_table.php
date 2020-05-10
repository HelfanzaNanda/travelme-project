<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('license_number', '20')->unique();
            $table->string('business_owner', '30');
            $table->string('business_name', '30');
            $table->enum('status', ['0', '1'])->default('1');
            $table->timestamps();
        });
        DB::table('travel')->insert([
            'license_number' => '12345',
            'business_owner' => 'connext alpha',
            'business_name' => 'connext tegal'
        ]);
        DB::table('travel')->insert([
            'license_number' => '54321',
            'business_owner' => 'oke trans',
            'business_name' => 'oke trans'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('travel');
    }
}
