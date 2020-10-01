<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('course_code',100)->nullable();
            $table->string('course_en_name')->nullable();
            $table->string('course_en_desc')->nullable();
            $table->integer('course_sub_category_id')->unsigned();
            $table->string('course_image',1000)->nullable();
            $table->string('course_image_thumbnail',1000)->nullable();
            $table->integer('course_duration');
            $table->text('course_brochure')->nullable();
            $table->text('Accreditation')->nullable();
            $table->text('course_highlight')->nullable();
            $table->text('course_objectives')->nullable();
            $table->text('course_audience')->nullable();
            $table->text('course_training_methods')->nullable();
            $table->longText('course_daily_agenda')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
