<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam', function (Blueprint $table) {
            $table->id();
            $table->string('Question');
            $table->string('Option1');
            $table->string('Option2');
            $table->string('Option3');
            $table->string('true_Option');
            $table->string('image')->nullable();
            $table->foreignId('employment_item_id');
            $table->foreign('employment_item_id')->references('id')->on('employment_items')->onDelete('cascade');
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
        Schema::dropIfExists('exam');
    }
}
