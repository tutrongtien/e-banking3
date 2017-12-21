<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id'); 
            $table->dateTime('time'); 
            $table->string('place', 100); 
            $table->string('detail', 100);
            $table->string('note', 100);
            $table->float('money', 15);
            $table->integer('bank_id')->nullable();
            $table->integer('bank_number');
            $table->boolean('type');
            $table->float('balance', 15);
            $table->boolean('status')->default(false);
            $table->integer('account_id')->unsigned(); 
            $table->foreign('account_id')->references('id')->on('accounts');
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
        Schema::dropIfExists('transactions');
    }
}
