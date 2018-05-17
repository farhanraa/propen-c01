<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTableJatahCuti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('jatah_cuti', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('id_employee');
        $table->integer('id_jenis');
        $table->date('tanggal_awal');
        $table->date('tanggal_akhir');
        $table->date('tanggal_hangus');
        $table->integer('sisa_cuti');
        $table->integer('is_berlaku');
        
        $table->foreign('id_employee')
        ->references('id')
        ->on('employee');
         $table->foreign('id_jenis')
        ->references('id')
        ->on('jenis_cuti');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jatah_cuti');
    }
}