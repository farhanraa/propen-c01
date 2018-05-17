<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTableKeluargaOrangTua extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluarga_orang_tua', function (Blueprint $table) {
        
        $table->increments('id');
        $table->string('nama');
        $table->integer('id_employee')->unsigned();
        $table->string('hubungan');
        $table->string('pendidikan')->nullable();
        $table->string('tempat_lahir');
        $table->date('tanggal_lahir');
        $table->char('jenis_kelamin', 1);
        $table->string('pekerjaan')->nullable();
        $table->integer('no_telepon');
        
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
        Schema::dropIfExists('keluarga_orang_tua');
    }
}