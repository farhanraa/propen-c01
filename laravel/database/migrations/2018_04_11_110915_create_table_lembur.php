<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTableLembur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('overtime', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('id_employee');
        $table->string('kode_pengajuan');
        $table->date('tanggal');
        $table->time('waktu_mulai');
        $table->time('waktu_selesai');
        $table->longText('alasan');
        $table->string('status');
        
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
        Schema::dropIfExists('overtime');
    }
}