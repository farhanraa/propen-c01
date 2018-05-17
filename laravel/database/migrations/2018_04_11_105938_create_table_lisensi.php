<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTableLisensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('lisensi', function (Blueprint $table) {
        
        $table->increments('id');
        $table->string('nomor')->unique();
        $table->integer('id_employee')->unsigned();
        $table->string('jenis_lisensi');
        $table->date('tanggal');
        $table->date('tanggal_hangus');
       
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
         Schema::dropIfExists('lisensi');
    }
}