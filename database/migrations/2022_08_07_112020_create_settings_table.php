<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('theme_color')->default('none');
            $table->string('phone')->default('none');
            $table->string('address')->default('none');
            $table->string('email')->default('none');
            $table->string('trans_code')->default('none');
            $table->string('telegram_id')->default('none');
            $table->string('instagram_id')->default('none');
            $table->string('whatsapp_number')->default('none');
            $table->string('exam_cost')->default(50000);
            $table->string('logo')->default('none');
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
        Schema::dropIfExists('settings');
    }
}
