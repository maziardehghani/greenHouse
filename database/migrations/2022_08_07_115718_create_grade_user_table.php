<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradeUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('exam_form')->nullable();
            $table->boolean('is_test')->default(0);
            $table->boolean('is_pay')->default(0);
            $table->integer('employment_item_id');
            $table->integer('grade')->nullable();
            $table->string('nameFamily');
            $table->bigInteger('code_meli');
            $table->bigInteger('shomare_shenasname');
            $table->string('sodoor_place');
            $table->string('born_date');
            $table->string('born_place');
            $table->string('nationality');
            $table->string('religion');
            $table->string('faith');
            $table->integer('military');
            $table->string('dismiss')->nullable();
            $table->integer('marriage');
            $table->string('child_count')->nullable();
            $table->integer('education');
            $table->string('education_place');
            $table->string('speciality');
            $table->integer('issar');
            $table->text('address');
            $table->string('code_post');
            $table->string('phone');
            $table->text('awards')->nullable();
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
        Schema::dropIfExists('grade_user');
    }
}
