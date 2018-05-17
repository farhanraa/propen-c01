<?php

use Illuminate\Database\Seeder;

class LemburTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('overtime')->insert([
        'id_employee'=> '1',
        'tanggal'=> '2016-03-18',
        'waktu_mulai'=>'07:40:45',
        'waktu_selesai'=>'20:12:00',
        'alasan'=>'Upload UHL pada sistem AHS',
        'status'=>'Diterima',
       ]);  

    	DB::table('overtime')->insert([
        'id_employee'=> '2',
        'tanggal'=> '2016-03-20',
        'waktu_mulai'=>'07:59:45',
        'waktu_selesai'=>'21:12:00',
        'alasan'=>'Upload UHL pada sistem AHS',
        'status'=>'Menunggu Persetujuan HoD',
       ]);  


    }
}
