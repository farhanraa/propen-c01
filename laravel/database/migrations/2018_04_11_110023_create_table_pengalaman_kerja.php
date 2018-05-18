<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePengalamanKerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengalaman_kerja', function (Blueprint $table) {
        
        $table->increments('id');
        $table->string('nama_perusahaan');
        $table->integer('id_employee')->unsigned();
        $table->string('jabatan');
        $table->string('jabatan_atasan_langsung')->nullable();
        $table->string('ringkasan_jenis_pekerjaan');
        $table->string('alasan_keluar');
        $table->string('gaji_terakhir');
        $table->string('periode');
        
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
        
         Schema::dropIfExists('pengalaman_kerja');
    }
}