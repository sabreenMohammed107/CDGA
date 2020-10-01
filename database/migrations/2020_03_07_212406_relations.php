<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Relations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //  This is Realations for the course_sub_categories Table ..
        Schema::table('course_sub_categories', function (Blueprint $table) {
            $table->foreign('course_category_id')->references('id')->on('course_categories');
           
        });
         //  This is Realations for the rounds Table ..
         Schema::table('rounds', function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('venue_id')->references('id')->on('venues');
        });
            //  This is Realations for the venues Table ..
        Schema::table('venues', function (Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries');
           
        });
         //  This is Realations for the courses Table ..
         Schema::table('courses', function (Blueprint $table) {
            $table->foreign('course_sub_category_id')->references('id')->on('course_sub_categories');
           
        });

         //  This is Realations for the branches Table ..
         Schema::table('branches', function (Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('venue_id')->references('id')->on('venues');
           
        });

         //  This is Realations for the applicants Table ..
         Schema::table('applicants', function (Blueprint $table) {
            $table->foreign('salut_id')->references('id')->on('applicant_saluts');
            $table->foreign('register_round_id')->references('id')->on('rounds');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('venue_id')->references('id')->on('venues');
            $table->foreign('course_id')->references('id')->on('courses');
        });
           
        //  This is Realations for the careers_applicants Table ..
        Schema::table('careers_applicants', function (Blueprint $table) {
            $table->foreign('career_id')->references('id')->on('careers');
            $table->foreign('carrer_level_id')->references('id')->on('career_levels');
           
        });


         //  This is Realations for the related_courses Table ..
         Schema::table('related_courses', function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('related_course_id')->references('id')->on('courses');
           
        });

        //  This is Realations for the billing_details Table ..
        Schema::table('billing_details', function (Blueprint $table) {
            $table->foreign('salut_id')->references('id')->on('applicant_saluts');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('venue_id')->references('id')->on('venues');
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
        });
           
         //  This is Realations for the speaker_course Table ..
         Schema::table('speaker_courses', function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on('teach_courses');
            $table->foreign('speaker_id')->references('id')->on('speakers')->onDelete('cascade');
           
        });
          //  This is Realations for the speakers Table ..
          Schema::table('speakers', function (Blueprint $table) {
            $table->foreign('salut_id')->references('id')->on('applicant_saluts');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('venue_id')->references('id')->on('venues');
            
        });

          //  This is Realations for the speaker_expertise Table ..
          Schema::table('speakers_expertises', function (Blueprint $table) {
            $table->foreign('speaker_id')->references('id')->on('speakers')->onDelete('cascade');
            $table->foreign('expertise_id')->references('id')->on('expertises');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
