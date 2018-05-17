<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTableHobiDanPrestasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hobi_dan_prestasi', function (Blueprint $table) {
        
        $table->increments('id');
        $table->string('hobi');
        $table->integer('id_employee')->unsigned();
        $table->string('prestasi');
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
        Schema::dropIfExists('hobi_dan_prestasi');
    }
}