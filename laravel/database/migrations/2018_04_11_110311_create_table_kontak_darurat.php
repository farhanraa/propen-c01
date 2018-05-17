<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTableKontakDarurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('kontak_darurat', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nama_kontak')->unique();
        $table->string('hubungan_kontak');
        $table->integer('id_employee')->unsigned();
        $table->integer('no_hp_kontak')->unique();
        $table->integer('no_telepon_kontak')->unique()->nullable();
        $table->string('alamat_kontak');
        $table->string('kota_kontak');
        $table->string('provinsi_kontak');
        $table->string('kode_pos_kontak');
        
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
        Schema::dropIfExists('kontak_darurat');
    }
}