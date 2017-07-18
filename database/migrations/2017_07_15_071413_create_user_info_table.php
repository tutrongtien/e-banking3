<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identity_card');
            $table->date('date_of_identity_card');
            $table->string('name', 100);
            $table->date('date_of_birth');
            $table->string('phone', 20);
            $table->string('address', 100);
            $table->string('city', 100);
            $table->string('district', 100);
            $table->string('ward', 100);
            $table->string('email', 100);
            $table->string('job', 50);
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
        Schema::dropIfExists('user_info');
    }
}
