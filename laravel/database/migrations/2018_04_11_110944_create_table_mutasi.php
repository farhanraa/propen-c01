<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMutasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutasi', function (Blueprint $table) {

        $table->increments('id');
        $table->integer('id_employee')->unsigned();
        $table->string('jenis_mutasi');
        $table->date('tanggal_diterima_surat');
        $table->string('nama_pekerjaan');
        $table->date('tanggal_efektif');
        $table->string('nomor_surat');
        $table->date('tanggal_surat');
        $table->longText('informasi');
        $table->integer('id_cabang');
        $table->integer('id_departemen');
        
        $table->foreign('id_employee')
        ->references('id')
        ->on('employee');
        
        $table->foreign('id_cabang')
        ->references('id')
        ->on('cabang');
        
        $table->foreign('id_departemen')
        ->references('id')
        ->on('departemen');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mutasi');
    }
}