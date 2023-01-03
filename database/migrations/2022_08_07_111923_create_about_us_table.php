<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->text('top_text')->nullable();
            $table->string('top_image')->nullable();
            $table->string('top_image_title')->nullable();
            $table->text('top_image_text')->nullable();
            $table->string('middle_left_title')->nullable();
            $table->string('middle_middle_title')->nullable();
            $table->string('middle_right_title')->nullable();
            $table->text('middle_left_text')->nullable();
            $table->text('middle_middle_text')->nullable();
            $table->text('middle_right_text')->nullable();
            $table->string('footer_left_image')->nullable();
            $table->string('footer_middle_image')->nullable();
            $table->string('footer_right_image')->nullable();
            $table->string('footer_left_title')->nullable();
            $table->string('footer_middle_title')->nullable();
            $table->string('footer_right_title')->nullable();
            $table->text('footer_left_text')->nullable();
            $table->text('footer_middle_text')->nullable();
            $table->text('footer_right_text')->nullable();

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
        Schema::dropIfExists('about_us');
    }
}
