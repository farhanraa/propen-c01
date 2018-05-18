<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKemampuanBahasa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kemampuan_bahasa', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nama_bahasa');
        $table->integer('id_employee')->unsigned();
        $table->string('kemampuan_berbicara');
        $table->string('kemampuan_menulis');
        
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
        Schema::dropIfExists('kemampuan_bahasa');
    }
}
