<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->unsignedInteger('course_id');
            $table->integer('lesson_index');
            $table->timestamps();
            $table->string('course_name');
            $table->string('lesson_name')->nullable();
            $table->date('lesson_date');
            $table->time('lesson_time');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->primary(['course_id','lesson_index']);
            $table->integer('how_long');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
