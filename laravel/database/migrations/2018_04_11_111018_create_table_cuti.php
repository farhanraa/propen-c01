<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTableCuti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuti', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('id_employee');
        $table->integer('id_jenis');
        $table->date('tanggal_mulai');
        $table->date('tanggal_selesai');
        $table->longText('alasan')->nullable();
        $table->string('alamat');
        $table->bigInteger('no_telepon');
        $table->string('pegawai_pengganti');
        $table->string('status');
        
        $table->foreign('id_employee')
        ->references('id')
        ->on('employee');
        $table->foreign('id_jenis')
        ->references('id')
        ->on('jenis_cuti');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuti');
    }
}