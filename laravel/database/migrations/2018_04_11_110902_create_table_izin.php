<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTableIzin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('id_employee');
        $table->string('jenis');
        $table->date('tanggal_permohonan');
        $table->time('waktu');
        $table->longText('alasan');
        $table->string('status');
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
        Schema::dropIfExists('attendance');
    }
}