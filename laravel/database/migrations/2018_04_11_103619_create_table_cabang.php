<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCabang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('cabang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_cabang')->unique();
            $table->string('nama_cabang');
            $table->string('contact_person')->nullable();
            $table->string('no_handphone')->nullable();
            $table->integer('is_aktif');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('cabang');
    }
}
