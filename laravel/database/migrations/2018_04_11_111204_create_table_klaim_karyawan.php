<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTableKlaimKaryawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klaim_karyawan', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('id_klaim')->unsigned();
        $table->integer('id_employee')->unsigned();
        $table->bigInteger('sisa_klaim')->default(0);
        
        $table->foreign('id_employee')
        ->references('id')
        ->on('employee');
        
        $table->foreign('id_klaim')
        ->references('id')
        ->on('peraturan_klaim');
        
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('klaim_karyawan');
    }
}