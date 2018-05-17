<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTablePeraturanKlaim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('peraturan_klaim', function (Blueprint $table) {
        $table->increments('id');
        $table->string('id_klaim')->unique();
        $table->string('jenis');
        $table->integer('id_peraturan')->unsigned();
        $table->integer('nominal_klaim');
        $table->date('tanggal_awal');
        $table->date('tanggal_akhir');
        $table->date('tanggal_hangus');
        $table->integer('is_berlaku');
        $table->foreign('id_peraturan')
        ->references('id')
        ->on('peraturan_pengeluaran_klaim');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peraturan_klaim');
    }
}