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
        'kode_pengajuan'=>'KDL001',
        'tanggal'=> '2017-03-18',
        'waktu_mulai'=>'07:40:45',
        'waktu_selesai'=>'20:12:00',
        'alasan'=>'Upload UHL pada sistem AHS',
        'status'=>'Diterima',
       ]);  

        DB::table('overtime')->insert([
        'id_employee'=> '2',
        'kode_pengajuan'=>'KDL002',
        'tanggal'=> '2016-03-20',
        'waktu_mulai'=>'07:59:45',
        'waktu_selesai'=>'21:12:00',
        'alasan'=>'Upload UHL pada sistem AHS',
        'status'=>'Menunggu Persetujuan HoD',
       ]);  
        DB::table('overtime')->insert([
        'id_employee'=> '3',
        'kode_pengajuan'=>'KDL003',
        'tanggal'=> '2016-03-22',
        'waktu_mulai'=>'07:59:45',
        'waktu_selesai'=>'21:12:00',
        'alasan'=>'Upload UHL pada sistem AHS',
        'status'=>'Diterima',
       ]);

        DB::table('overtime')->insert([
        'id_employee'=> '4',
        'kode_pengajuan'=>'KDL004',
        'tanggal'=> '2017-03-08',
        'waktu_mulai'=>'08:59:45',
        'waktu_selesai'=>'21:12:00',
        'alasan'=>'Upload UHL pada sistem AHS',
        'status'=>'Menunggu Persetujuan HRM',
       ]);

        DB::table('overtime')->insert([
        'id_employee'=> '3',
        'kode_pengajuan'=>'KDL003',
        'tanggal'=> '2016-03-08',
        'waktu_mulai'=>'08:59:45',
        'waktu_selesai'=>'12:12:00',
        'alasan'=>'Upload UHL pada sistem AHS',
        'status'=>'Menunggu Persetujuan HRM',
       ]);

        DB::table('overtime')->insert([
        'id_employee'=> '1',
        'kode_pengajuan'=>'KDL004',
        'tanggal'=> '2015-03-08',
        'waktu_mulai'=>'07:59:45',
        'waktu_selesai'=>'21:12:00',
        'alasan'=>'Upload UHL pada sistem AHS',
        'status'=>'Menunggu Persetujuan HRM',
       ]);

        DB::table('overtime')->insert([
        'id_employee'=> '2',
        'kode_pengajuan'=>'KDL003',
        'tanggal'=> '2016-03-08',
        'waktu_mulai'=>'18:59:45',
        'waktu_selesai'=>'21:12:00',
        'alasan'=>'Upload UHL pada sistem AHS',
        'status'=>'Menunggu Persetujuan HRM',
       ]);


        DB::table('overtime')->insert([
        'id_employee'=> '1',
        'kode_pengajuan'=>'KDL004',
        'tanggal'=> '2017-03-08',
        'waktu_mulai'=>'18:59:45',
        'waktu_selesai'=>'21:12:00',
        'alasan'=>'Upload UHL pada sistem AHS',
        'status'=>'Menunggu Persetujuan HRM',
       ]);

    }
}
