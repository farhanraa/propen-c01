<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAbsensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('absensi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_employee');
            $table->string('nama_cabang');
            $table->date('tanggal');
            $table->time('jam_datang');
            $table->time('jam_pulang');
            $table->string('keterangan')->nullable();
            $table->integer('overtime')->nullable();

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
         Schema::dropIfExists('absensi');
    }
}
