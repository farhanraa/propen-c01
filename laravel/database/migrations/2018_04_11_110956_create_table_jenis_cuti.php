<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTableJenisCuti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('jenis_cuti', function (Blueprint $table) {
        $table->increments('id');
        $table->string('id_jenis')->unique();
        $table->string('nama_jenis');
        $table->integer('durasi_cuti');
        $table->integer('is_berlaku');
        
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_cuti');
    }
}