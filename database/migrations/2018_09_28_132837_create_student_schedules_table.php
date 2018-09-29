<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_schedules', function (Blueprint $table) {
            $table->integer('id')->increments()->unique();
            $table->timestamps();
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('schedule_id');
            $table->unsignedInteger('teacher_id');
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('class_id');
            $table->unsignedInteger('institution_id');
            $table->string('teacher_name');
            $table->string('class_name');
            $table->string('course_name');
            $table->string('institution_name');
            $table->string('student_name');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('institution_id')->references('id')->on('institutions');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->foreign('class_id')->references('id')->on('school_classes');
            $table->primary(['student_id','schedule_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_schedules');
    }
}
