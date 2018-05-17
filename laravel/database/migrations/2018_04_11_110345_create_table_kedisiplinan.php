<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTableKedisiplinan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('kedisiplinan', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('masa_berlaku');
        $table->integer('id_employee')->unsigned();
        $table->string('jenis');
        $table->string('subjek');
        $table->longText('review')->nullable();
        $table->longText('keterangan')->nullable();
        
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
        Schema::dropIfExists('kedisiplinan');
    }
}