<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
  
        Schema::create('billing_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('salut_id')->unsigned()->nullable();
            $table->string('name',1000)->nullable();
            $table->integer('country_id')->unsigned();
            $table->string('job_title',1000)->nullable();
            $table->string('company',1000)->nullable();
            $table->integer('venue_id')->unsigned();
            $table->string('address',2000)->nullable();
            $table->string('email',250)->nullable();
            $table->string('phone',50)->nullable();
            $table->string('mobile',50)->nullable();
            $table->string('fax',50)->nullable();
            $table->integer('applicant_id')->unsigned();
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
        Schema::dropIfExists('billing_details');
    }
}
