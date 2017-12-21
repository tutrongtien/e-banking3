<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SwitchEmailColumnFromUserInfoTableToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_info', function (Blueprint $table) {
            $table->dropColumn('email');
        });
        Schema::table('users', function (Blueprint $table) {
             $table->string('email', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_info', function (Blueprint $table) {
            $table->string('email', 100);
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('email');
        });
    }
}
