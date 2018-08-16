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
            $table->increments('id')->unique();   //课程ID
            $table->unsignedInteger('institution_id');
            $table->unsignedInteger('teacher_id');
            $table->string('teacher_name',50);
            $table->string('course_name',50);
            $table->longText('course_content')->nullable();        //课程简介
            $table->timestamps();
            $table->integer('course_count');    //课程开始的课时数
            $table->string('course_category',50)->nullable();


            $table->foreign('institution_id')->references('id')->on('users');
            $table->foreign('teacher_id')->references('id')->on('teachers');
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
