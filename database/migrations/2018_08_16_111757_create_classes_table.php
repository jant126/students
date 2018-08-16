<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id')->unique();   //班级ID
            $table->unsignedInteger('institution_id');
            $table->timestamps();
            $table->string('class_name',50);
            $table->integer('class_count')->nullable();  //班级学生人数
            $table->dateTime('class_star_time')->nullable();
            $table->dateTime('class_end_time')->nullable();
            $table->longText('class_content')->nullable();        //班级简介


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
        Schema::dropIfExists('classes');
    }
}
