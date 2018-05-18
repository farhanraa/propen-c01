<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKontrakPercobaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('kontrak_percobaan', function (Blueprint $table) {
        
        $table->increments('id');
        $table->string('jenis');
        $table->integer('id_employee')->unsigned();
        $table->integer('jangka_waktu')->unsigned();
        $table->longText('keterangan');
        $table->date('tanggal_awal');
        $table->date('tanggal_akhir');

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
        Schema::dropIfExists('kontrak_percobaan');
    }
}
