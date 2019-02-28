<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotTableScammerUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scammer_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('scammer_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('scammer_id')->references('id')->on('scammers')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scammer_user');
    }
}
