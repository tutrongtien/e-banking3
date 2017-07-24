<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDataTypeOnUserInfoAndAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_info', function (Blueprint $table) {
            $table->float('identity_card', 15)->change();
        });

        Schema::table('accounts', function (Blueprint $table) {
            $table->float('bank_number', 15)->change();
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
            $table->integer('identity_card')->change();
        });

        Schema::table('accounts', function (Blueprint $table) {
            $table->integer('bank_number')->change();
        });
    }
}
