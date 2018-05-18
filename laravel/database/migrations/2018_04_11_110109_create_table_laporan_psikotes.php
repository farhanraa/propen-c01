<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLaporanPsikotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_psikotes', function (Blueprint $table) {
        
        $table->increments('id');
        $table->string('hasil_psikotes');
        $table->integer('id_employee');
        $table->date('tgl_psikotes');
        $table->date('tgl_terima_psikotes');
        $table->longText('uraian')->nullable();
        $table->longText('saran')->nullable();
        

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
       Schema::dropIfExists('laporan_psikotes');        
    }
}
