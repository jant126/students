<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('class_name');
            $table->string('class_content')->nullable();
            $table->integer('class_count');
            $table->unsignedInteger('institution_id');
            $table->string('institution_name');
            $table->dateTime('class_start');
            $table->dateTime('class_end');
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
        Schema::dropIfExists('school_classes');
    }
}
