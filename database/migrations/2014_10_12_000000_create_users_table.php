<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->increments('id');
            //$table->timestamp('email_verified_at')->nullable();
            //$table->string('password')->nullable();

            // Twitter
            $table->string('twitter_id')->unique()->nullable();
            $table->string('email')->nullable();
            $table->string('avatar')->nullable();
            $table->string('name')->nullable();
            $table->string('nickname')->nullable();

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
        Schema::dropIfExists('users');
    }
}
