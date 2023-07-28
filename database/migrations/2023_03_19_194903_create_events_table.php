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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('start');
            $table->string('end');
            $table->integer('status')->default(0)->nullable();
            $table->integer('is_all_day')->default(0)->nullable();
            $table->string('title');
            $table->text('description');
            $table->string('event_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            // Khóa ngoại user_id sẽ tham chiếu đến khóa chính id của bảng user
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
