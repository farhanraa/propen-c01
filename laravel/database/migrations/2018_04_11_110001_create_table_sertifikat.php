<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTableSertifikat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sertifikat', function (Blueprint $table) {
        
        $table->increments('id');
        $table->string('nama_sertifikat');
        $table->integer('id_employee')->unsigned();
        $table->integer('tahun_sertifikat');
        $table->string('penyelenggara');
        $table->string('catatan_sertifikat')->nullable();
        $table->string('tingkat_sertifikat');
    
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
        Schema::dropIfExists('sertifikat');
    }
}