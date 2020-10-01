<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_sub_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subcategory_code',100)->nullable();
            $table->string('subcategory_en_name',1000)->nullable();
            $table->string('subcategory_en_description',2000)->nullable();
            $table->string('subcategory_image',1000)->nullable();
            $table->integer('active');
            $table->integer('course_category_id')->unsigned();
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
        Schema::dropIfExists('course_sub_categories');
    }
}
