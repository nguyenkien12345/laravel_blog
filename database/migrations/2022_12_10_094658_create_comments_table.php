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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->string('content');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('post_id');
            $table->timestamps();

            // Khi 1 user bị xóa thì những comment của user đó cũng sẽ bị xóa theo
            // Gắn khóa ngoại cho field user_id tham chiếu đến khóa chính id của bảng users
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            // Khi 1 post bị xóa thì những comment của post đó cũng sẽ bị xóa theo
            // Gắn khóa ngoại cho field post_id tham chiếu đến khóa chính id của bảng posts
            $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
