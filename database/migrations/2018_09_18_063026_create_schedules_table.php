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
//            $table->increments('schedule_id')->unique();
            $table->integer('id')->increments()->unique();
            $table->timestamps();
            $table->unsignedInteger('teacher_id');
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('class_id');
            $table->unsignedInteger('institution_id');
            $table->string('teacher_name');
            $table->string('class_name');
            $table->string('course_name');
            $table->string('institution_name');
            $table->boolean('has_started')->default(false);
            $table->boolean('has_cancelled')->default(false);
            $table->unsignedInteger('classroom_id')->nullable();
            $table->string('classroom_name')->nullable();
            $table->foreign('institution_id')->references('id')->on('institutions');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->foreign('class_id')->references('id')->on('school_classes');
            $table->primary(['institution_id','course_id','teacher_id','class_id']);
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
