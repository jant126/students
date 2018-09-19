<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
//            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('teacher_id');
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('class_id');
            $table->boolean('has_started')->default(false);
            $table->boolean('has_cancelled')->default(false);
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->foreign('class_id')->references('id')->on('school_classes');
            $table->primary(['course_id','teacher_id','class_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
