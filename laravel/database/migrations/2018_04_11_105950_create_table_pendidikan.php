<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePendidikan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikan', function (Blueprint $table) {
        
        $table->increments('id');
        $table->string('nama_sekolah');
        $table->integer('id_employee')->unsigned();
        $table->string('tingkat_pendidikan');
        $table->string('jurusan')->nullable();
        $table->string('ipk');
        $table->longText('catatan')->nullable();
        $table->string('tahun_masuk');
        $table->string('tahun_lulus');
      
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
        Schema::dropIfExists('pendidikan');
    }
}
