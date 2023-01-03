<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_conditions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('employment_item_id');
            $table->foreign('employment_item_id')->references('id')->on('employment_items')->onDelete('cascade');
            $table->integer('part_condition');
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
        Schema::dropIfExists('employment_conditions');
    }
}
