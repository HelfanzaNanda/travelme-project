<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('license_number', '50')->unique();
            $table->string('business_owner', '30');
            $table->string('business_name', '30');
            $table->text('address');
            $table->string('email', '50')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password')->nullable();
            $table->text('photo')->nullable();
            $table->string('telephone', '13')->unique();
            $table->enum('active', ['0', '1', '2'])->default('1');
            $table->string('activation_token')->nullable();
            $table->string('domicile', '50');
            $table->double('balance')->default(0);
            $table->string('name_bank', 10)->nullable();
            $table->string('account_number', 16)->nullable();
            $table->string('account_name', 50)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('owners');
    }
}
