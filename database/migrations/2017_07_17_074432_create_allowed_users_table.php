<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllowedUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allowed_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('uuid');
            $table->integer('babe_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('babe_id')->references('id')->on('babes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('allowed_users', function (Blueprint $table) {
            $table->dropForeign(['babe_id']);
        });
        Schema::dropIfExists('allowed_users');
    }
}
