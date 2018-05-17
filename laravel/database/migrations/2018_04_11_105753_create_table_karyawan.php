<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKaryawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('employee', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nik_employee')->unique();
        $table->string('nama');
        $table->date('tanggal_lahir');
        $table->string('tempat_lahir');
        $table->float('tinggi')->nullable();
        $table->char('golongan_darah', 2);
        $table->string('agama');
        $table->float('berat_badan')->nullable();
        $table->string('no_dplk')->unique();
        $table->bigInteger('no_bpjs')->unique();
        $table->bigInteger('no_npwp')->unique()->nullable();
        $table->bigInteger('no_telepon')->nullable()->unique();
        $table->bigInteger('no_jamsostek')->unique()->nullable();
        $table->bigInteger('no_handphone')->unique();
        $table->string('jalan_identitas');
        $table->string('kota_identitas');
        $table->string('provinsi_identitas');
        $table->string('kode_pos_identitas');
        $table->string('alamat_tempat_tinggal');
        $table->string('foto')->nullable();
        $table->string('email_perusahaan')->unique()->nullable();
        $table->string('email')->unique();
        $table->string('status_perkawinan');
        $table->string('jenis_identitas');
        $table->bigInteger('no_identitas')->unique();
        $table->string('status')->default('created');
        $table->date('tanggal_masuk');
        $table->integer('id_departemen');
        $table->integer('id_cabang');
        $table->integer('id_jabatan');
        $table->integer('id_fingerprint');
        $table->char('jenis_kelamin', 1);

        $table->foreign('id_departemen')
        ->references('id')
        ->on('departemen');

        $table->foreign('id_cabang')
        ->references('id')
        ->on('cabang');

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
         Schema::dropIfExists('employee');
    }
}
