<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        Schema::create('speakers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('salut_id')->unsigned();
            $table->string('frist_name',250)->nullable();
            $table->string('last_name',250)->nullable();
            $table->string('email',250)->nullable();
            $table->integer('country_id')->unsigned();
            $table->integer('venue_id')->unsigned();
            $table->string('address',250)->nullable();
            $table->string('mobile',250)->nullable();
            $table->string('phone',250)->nullable();
            $table->string('other_data',1000)->nullable();
            $table->string('cv_path',1000)->nullable();
            $table->string('doc_path',1000)->nullable();
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
        Schema::dropIfExists('speakers');
    }
}
