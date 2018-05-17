<?php

use Illuminate\Database\Seeder;

class JenisCutiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_cuti')->insert([
        'id_jenis'=> 'C20141002022',
        'nama_jenis'=>'Tahunan',
        'durasi_cuti'=>'12',
        'is_berlaku'=>'1',
    	]);

    	DB::table('jenis_cuti')->insert([
        'id_jenis'=> 'D20151002022',
        'nama_jenis'=>'Kehamilan',
        'durasi_cuti'=>'12',
        'is_berlaku'=>'1',
    	]);

    	DB::table('jenis_cuti')->insert([
        'id_jenis'=> 'E20161002022',
        'nama_jenis'=>'Sakit',
        'durasi_cuti'=>'12',
        'is_berlaku'=>'1',
    	]);

    	DB::table('jenis_cuti')->insert([
        'id_jenis'=> 'G20181002022',
        'nama_jenis'=>'Besar',
        'durasi_cuti'=>'90',
        'is_berlaku'=>'1',
    	]);

    	DB::table('jenis_cuti')->insert([
        'id_jenis'=> 'H20191002022',
        'nama_jenis'=>'Bersama',
        'durasi_cuti'=>'12',
        'is_berlaku'=>'1',
    	]);

    	DB::table('jenis_cuti')->insert([
        'id_jenis'=> 'I20181002022',
        'nama_jenis'=>'Penting',
        'durasi_cuti'=>'12',
        'is_berlaku'=>'1',
    	]);

    	DB::table('jenis_cuti')->insert([
        'id_jenis'=> 'J20181002022',
        'nama_jenis'=>'Berbayar',
        'durasi_cuti'=>'12',
        'is_berlaku'=>'1',
    	]);
    }
}
