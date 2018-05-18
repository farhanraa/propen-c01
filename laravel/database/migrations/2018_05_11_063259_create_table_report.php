<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('report', function (Blueprint $table) {
        $table->increments('id');
        $table->string('kode_report')->unique();
        $table->string('jenis_report');
        $table->string('bulan');
        $table->integer('tahun');
        $table->integer('id_cabang');
        $table->integer('total_pengajuan');
        $table->integer('total_pengajuan_diterima');
        $table->integer('total_pengajuan_ditolak');
        $table->integer('total_pengajuan_dibatalkan');
        $table->integer('total_nominal')->nullable();
        $table->foreign('id_cabang')
        ->references('id')
        ->on('cabang');
    });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report');
    }
}