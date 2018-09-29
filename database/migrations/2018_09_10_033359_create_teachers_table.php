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
            $table->increments('id');
            $table->timestamps();
            $table->string('teacher_name');
            $table->string('teacher_content')->nullable();
            $table->string('teacher_sex');
            $table->string('phone')->unique();
            $table->string('teacher_WeiXinOpenID')->nullable();
            $table->string('institution_name');
            $table->unsignedInteger('institution_id');
            //新增老师，默认在职，如果删除，不进行实际删除操作，只将状态设置为离职（即dimission）
            $table->string('teacher_status')->default(\App\Models\Teacher::InService);
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
        Schema::dropIfExists('teachers');
    }
}
