<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTablePeraturanPengeluaranKlaim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('peraturan_pengeluaran_klaim', function (Blueprint $table) {
        $table->increments('id');
        $table->string('id_peraturan')->unique();
        $table->string('id_biaya');
        $table->integer('id_golongan')->unsigned();
        $table->integer('is_berlaku');
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
         Schema::dropIfExists('peraturan_pengeluaran_klaim');
    }
}