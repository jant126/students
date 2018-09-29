<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index(); //设置创建者ID
            $table->string('institution_name');
            $table->string('institution_code')->nullabel();
            $table->text('institution_content')->nullabel();
            $table->string('institution_address')->nullabel();
            $table->string('institution_legal_person')->nullabel();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institutions');
    }
}
