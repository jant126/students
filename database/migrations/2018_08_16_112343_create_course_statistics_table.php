<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_statistics', function (Blueprint $table) {
            $table->unsignedInteger('institution_id');
            $table->unsignedInteger('student_id');
            $table->string('student_name')->nullable();
            $table->unsignedInteger('class_id');
            $table->string('class_name')->nullable();
            $table->unsignedInteger('course_id');
            $table->string('course_name')->nullable();
            $table->integer('course_count');  //课程课时数
            $table->integer('finished_count');
            $table->integer('remain_count');

            $table->primary(['student_id','class_id','course_id']);
            $table->foreign('institution_id')->references('id')->on('users');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('class_id')->references('id')->on('classes');
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_statistics');
    }
}
