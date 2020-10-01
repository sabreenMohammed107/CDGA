<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rounds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('round_code',100)->nullable();
            $table->integer('course_id')->unsigned();
            $table->string('round_price',1000)->nullable();
            $table->integer('currency_id')->unsigned();
            $table->dateTime('round_start_date',6)->nullable();
            $table->dateTime('round_end_date',6)->nullable();
            $table->integer('country_id')->unsigned();
            $table->integer('venue_id')->unsigned();
            $table->string('round_place',1000)->nullable();
            $table->integer('show_home_order');
            $table->integer('active');
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
        Schema::dropIfExists('rounds');
    }
}
