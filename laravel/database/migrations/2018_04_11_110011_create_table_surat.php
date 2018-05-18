<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat', function (Blueprint $table) {
        
        $table->increments('id');
        $table->integer('nomor');
        $table->integer('id_employee')->unsigned();
        $table->string('jenis');
        $table->date('tanggal');
        $table->string('informasi');
        
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
         Schema::dropIfExists('surat');
    }
}