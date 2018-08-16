<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('phone')->unique();            //机构负责人手机号码
            $table->string('institution_name')->nullable();           //机构名称
            $table->string('institution_code')->nullable();           //机构代码
            $table->longText('institution_content')->nullable();        //机构简介
            $table->string('institution_address')->nullable();        //机构地址
            $table->string('institution_legal_person')->nullable();   //机构法人
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
