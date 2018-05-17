<?php

use Illuminate\Database\Seeder;

class IzinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attendance')->insert([
        'id_employee'=> '1',
        'jenis'=>'izin datang terlambat',
        'tanggal_permohonan'=> '2016-03-18',
        'waktu'=>'15:00',
        'alasan'=>'Mengantar keponakan ke rumah sakit untuk checkup',

        'status'=>'Diterima',

    	]);  



        DB::table('attendance')->insert([
        'id_employee'=> '2',
        'jenis'=>'izin pulang cepat',
        'tanggal_permohonan'=> '2017-03-18',
        'waktu'=>'15:00',
        'alasan'=>'Pergi keluar kota untuk kepentingan keluarga, saudara menikah',

        'status'=>'Menunggu Persetujuan HoD',

    	]);  
    }
}
