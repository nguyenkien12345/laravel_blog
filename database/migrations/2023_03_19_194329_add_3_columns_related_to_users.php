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
        Schema::table('users', function (Blueprint $table) {
            $table->text('google_calendar_access_token')->nullable();
            $table->text('google_calendar_refresh_token')->nullable();
            $table->text('google_calendar_user_account_info')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('google_calendar_access_token');
            $table->dropColumn('google_calendar_refresh_token');
            $table->dropColumn('google_calendar_user_account_info');
        });
    }
};
