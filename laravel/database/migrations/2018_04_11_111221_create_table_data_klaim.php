<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTableDataKlaim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_klaim', function (Blueprint $table) {
        $table->increments('id');
        $table->string('kode_data_klaim');
        $table->integer('id_employee')->unsigned();
        $table->integer('id_klaim')->unsigned();
        $table->date('tanggal_transaksi');
        $table->integer('nominal_klaim');
        $table->string('status');
        $table->longText('keterangan')->nullable();
        $table->string('bukti')->nullable();

        $table->foreign('id_employee')
        ->references('id')
        ->on('employee');
        
        $table->foreign('id_klaim')
        ->references('id')
        ->on('peraturan_klaim');
        
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_klaim');
    }
}