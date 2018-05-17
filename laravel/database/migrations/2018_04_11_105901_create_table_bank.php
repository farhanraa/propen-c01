<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTableBank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::defaultStringLength(191);
        Schema::create('bank', function (Blueprint $table) {
        
        $table->increments('id');
        $table->string('nomor_rekening_bank')->unique();
        $table->integer('id_employee')->unsigned();
        $table->string('nama_rekening');
        $table->string('nama_bank');
        $table->string('informasi_bank');
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
        Schema::dropIfExists('bank');
    }
}