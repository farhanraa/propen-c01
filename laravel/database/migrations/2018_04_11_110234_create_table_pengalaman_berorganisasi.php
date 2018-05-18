<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePengalamanBerorganisasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengalaman_berorganisasi', function (Blueprint $table) {
        
        $table->increments('id');
        $table->string('nama_organisasi');
        $table->integer('id_employee')->unsigned();
        $table->string('jenis_organisasi');
        $table->string('jabatan');
        $table->string('tahun_aktif');

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
        Schema::dropIfExists('pengalaman_berorganisasi');
    }
}
