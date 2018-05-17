<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableJabatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jabatan', function (Blueprint $table) {
        $table->increments('id');
        $table->string('id_jabatan')->unique();
        $table->string('nama_jabatan');
        $table->integer('is_aktif');
        $table->integer('id_golongan');

        $table->foreign('id_golongan')
        ->references('id')
        ->on('golongan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('jabatan');
    }
}
