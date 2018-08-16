<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_students', function (Blueprint $table) {
            $table->unsignedInteger('institution_id');
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('class_id');
            $table->integer('class_student_index');  //班级学生序号
            $table->string('student_name',50);
            $table->string('class_name',50);
            $table->primary(['student_id','class_id']);
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('class_id')->references('id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_students');
    }
}
