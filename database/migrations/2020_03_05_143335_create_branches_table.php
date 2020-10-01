<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('branch_name',1000)->nullable();
            $table->string('address',1000)->nullable();
            $table->string('office_phone',100)->nullable();
            $table->string('mobile',100)->nullable();
            $table->string('email',100)->nullable();
            $table->text('map_location',2000)->nullable();
            $table->integer('country_id')->unsigned();
            $table->integer('venue_id')->unsigned();
            $table->integer('hq');
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
        Schema::dropIfExists('branches');
    }
}
