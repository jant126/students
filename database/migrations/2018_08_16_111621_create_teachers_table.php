<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id')->unique();   //教师编号
            $table->timestamps();
            $table->unsignedInteger('institution_id');   //机构代码
            $table->string('teacher_name',50);
            $table->char('teacher_sex',2)->nullable();
            $table->integer('teacher_age')->nullable();
            $table->string('teacher_phone',13)->nullable();
            $table->string('teacher_weixin_id',100)->nullable();

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
        Schema::dropIfExists('teachers');
    }
}
