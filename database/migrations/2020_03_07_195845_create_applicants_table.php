<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
 
        Schema::create('applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',100)->nullable();
            $table->integer('salut_id')->unsigned()->nullable();
            $table->string('name',1000)->nullable();
            $table->integer('country_id')->unsigned()->nullable();
            $table->string('job_title',1000)->nullable();
            $table->string('company',1000)->nullable();
            $table->integer('venue_id')->unsigned()->nullable();

            $table->string('address',2000)->nullable();
            $table->string('email',1000)->nullable();
            $table->string('phone',50)->nullable();
            $table->string('mobile',50)->nullable();
            $table->string('fax',50)->nullable();

            $table->integer('register_round_id')->unsigned()->nullable();
            $table->integer('course_id')->unsigned()->nullable();
            $table->string('quk_enquery_notes',1000)->nullable();
            $table->integer('inhouse_no_days')->nullable();
            $table->string('inhouse_perefer_dates',1000)->nullable();
            $table->string('inhouse_requirements',1000)->nullable();
            $table->integer('applicant_type_id')->nullable();
            $table->integer('inhouse_no_particants')->nullable();
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
        Schema::dropIfExists('applicants');
    }
}
