<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBabesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('babes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('password');
            // remember to hash the passwords in the Babe Model
            $talbe->string('uuid');  // generate a unique user id for the user
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('babes');
    }
}
