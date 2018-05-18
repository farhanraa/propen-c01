<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableJabatanKaryawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('jabatan_karyawan', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('id_jabatan');
        $table->string('nama_jabatan');
        $table->integer('id_employee')->unsigned();
        $table->string('bagian')->nullable();
        $table->string('posisi')->nullable();
        $table->string('atasan_langsung');
        $table->date('tanggal_masuk');
        $table->date('tanggal_pengangkatan');
        $table->date('tanggal_keluar')->nullable();
        $table->string('status_karyawan');
        $table->longText('alasan_berhenti')->nullable();
        $table->foreign('id_employee')
        ->references('id')
        ->on('employee');
        $table->foreign('id_jabatan')
        ->references('id')
        ->on('jabatan');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jabatan_karyawan');
    }
}