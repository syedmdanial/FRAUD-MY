<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('medium');
            $table->double('amount', 8, 2);
            $table->string('picture');
            $table->text('description');
            $table->date('date');
            $table->string('bank_name')->nullable();
            $table->string('bank_account')->nullable();
            $table->unsignedInteger('scammer_id');
            $table->unsignedInteger('status');
            $table->timestamps();

            $table->foreign('scammer_id')->references('id')->on('scammers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
