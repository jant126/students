<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('student_number')->nullable(); //学号
            $table->string('student_name');
            $table->integer('student_age')->nullable();
            $table->string('student_sex');
            $table->string('student_id')->nullable(); //学生身份证号码
            $table->string('phone')->unique(); //直接插入用户表中
            $table->dateTime('student_join_date');
            $table->string('student_mother_name')->nullable();
            $table->string('student_mother_phone')->nullable();
            $table->string('student_father_name')->nullable();
            $table->string('student_father_phone')->nullable();
            $table->string('student_mother_WeiXinOpenID')->nullable();
            $table->string('student_father_WeiXinOpenID')->nullable();
            $table->string('institution_name');
            $table->unsignedInteger('institution_id');
            $table->foreign('institution_id')->references('id')->on('institutions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
