<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareersApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
 
        Schema::create('careers_applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('career_id')->unsigned();
            $table->string('name',250)->nullable();
            $table->string('email',250)->nullable();
            $table->string('mobile',250)->nullable();
            $table->string('cv_path',1000)->nullable();
            $table->string('doc_path',1000)->nullable();
            $table->integer('carrer_level_id')->unsigned()->nullable();
            $table->string('expected_salary',2000)->nullable();
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
        Schema::dropIfExists('careers_applicants');
    }
}
