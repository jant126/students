<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->unsignedInteger('institution_id');
            $table->increments('id')->unique();
            $table->timestamps();
            $table->string('student_number',18)->unique();
            $table->string('student_name',50);
            $table->integer('age')->nullable();
            $table->char('student_sex',2)->nullable();
            $table->dateTime('student_enrollment_time')->nullable();  //学生入学日期
            $table->string('father_name',50)->nullable();
            $table->string('father_phone',18)->nullable();
            $table->string('mather_name',50)->nullable();
            $table->string('mather_phone',18)->nullable();
            $table->string('father_weixin_id',100)->nullable();
            $table->string('mather_weixin_id',100)->nullable();
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
        Schema::dropIfExists('students');
    }
}
