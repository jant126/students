<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceSheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_sheet', function (Blueprint $table) {
            $table->unsignedInteger('institution_id');
            $table->unsignedInteger('class_id');
            $table->string('class_name',50);
            $table->unsignedInteger('student_id');
            $table->string('student_name',50);
            $table->unsignedInteger('course_id');
            $table->string('course_name',50);
            $table->integer('course_index');
            $table->string('course_chapter');  //章节主题
            $table->unsignedInteger('teacher_id');
            $table->string('teacher_name',50);
            $table->dateTime('attendance_time');
            $table->boolean('has_sended')->default(0);
            $table->boolean('sending_successed')->default(0);

            $table->primary(['course_id','course_index','student_id']);
            $table->foreign('class_id')->references('id')->on('classes');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('institution_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_sheet');
    }
}
