<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_onesignals', function (Blueprint $table) {
            $table->id();
            $table->string('device_type');
            $table->string('language');
            $table->float('game_version')->default(1.1);
            $table->string('device_model');
            $table->string('device_os');
            $table->integer('notification_types')->default(1);
            $table->string('user_id');
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
        Schema::dropIfExists('device_onesignals');
    }
};
