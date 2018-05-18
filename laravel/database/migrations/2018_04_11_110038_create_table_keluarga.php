<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKeluarga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluarga', function (Blueprint $table) {
        
        $table->increments('id');
        $table->string('nama');
        $table->integer('id_employee')->unsigned();
        $table->string('hubungan');
        $table->string('pendidikan')->nullable();
        $table->string('tempat_lahir');
        $table->date('tanggal_lahir');
        $table->char('jenis_kelamin', 1);
        $table->string('pekerjaan')->nullable();
        

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
         Schema::dropIfExists('keluarga');
    }
}