<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTableLaporanTesKesehatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_tes_kesehatan', function (Blueprint $table) {
        
        $table->increments('id');
        $table->string('hasil_medical_checkup');
        $table->integer('id_employee');
        $table->date('tgl_medical_checkup');
        $table->date('tgl_terima_medical_checkup');
        $table->string('masalah_kesehatan')->nullable();
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
        Schema::dropIfExists('laporan_tes_kesehatan'); 
    }
}