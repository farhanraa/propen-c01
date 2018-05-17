<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            SChema::defaultStringLength(191);
            $table->increments('id');
            $table->string('username');
            $table->string('email')->unique();
            $table->integer('id_employee')->unique();        
            $table->string('password');
            $table->string('role');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_employee')
            ->references('id')
            ->on('employee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
