<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_setting', function (Blueprint $table) {
            $table->unsignedInteger('institution_id');
            $table->unsignedInteger('course_id');
            $table->integer('course_index');   //课程序号
            $table->string('course_chapter');  //章节主题
            $table->string('course_name',50);
            $table->unsignedInteger('classroom_id');   //教室编号
            $table->string('classroom_name',50);
            $table->dateTime('course_star_time')->nullable();
            $table->dateTime('course_end_time')->nullable();
            $table->integer('course_minutes');   //上课时长

            $table->primary(['course_id','course_index']);
            $table->foreign('institution_id')->references('id')->on('users');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('classroom_id')->references('id')->on('classrooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_setting');
    }
}
