<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDepartemen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('departemen', function (Blueprint $table) {
        $table->increments('id');
        $table->string('id_departemen')->unique();
        $table->string('nama_departemen');
        $table->string('sub_departemen');
        $table->integer('is_aktif')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('departemen');
    }
}
