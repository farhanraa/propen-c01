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
        'kode_pengajuan'=>'KDI001',
        'jenis'=>'izin datang terlambat',
        'tanggal_permohonan'=> '2017-03-04',
        'waktu'=>'15:00',
        'alasan'=>'Mengantar keponakan ke rumah sakit untuk checkup',
        'status'=>'Diterima',

        ]);  


        DB::table('attendance')->insert([
        'id_employee'=> '2',
        'kode_pengajuan'=>'KDI002',
        'jenis'=>'izin pulang cepat',
        'tanggal_permohonan'=> '2017-03-18',
        'waktu'=>'15:00',
        'alasan'=>'Pergi keluar kota untuk kepentingan keluarga, saudara menikah',
        'status'=>'Menunggu Persetujuan HoD',

        ]);  

        DB::table('attendance')->insert([
        'id_employee'=> '2',
        'kode_pengajuan'=>'KDI003',
        'jenis'=>'izin pulang cepat',
        'tanggal_permohonan'=> '2017-03-19',
        'waktu'=>'13:00',
        'alasan'=>'kerumah sakit',
        'status'=>'Diterima',

        ]);  

        DB::table('attendance')->insert([
        'id_employee'=> '3',
        'kode_pengajuan'=>'KDI004',
        'jenis'=>'izin datang terlambat',
        'tanggal_permohonan'=> '2017-03-24',
        'waktu'=>'09:00',
        'alasan'=>'kerumah sakit',
        'status'=>'Diterima',

        ]); 

        DB::table('attendance')->insert([
        'id_employee'=> '1',
        'kode_pengajuan'=>'KDI004',
        'jenis'=>'izin datang terlambat',
        'tanggal_permohonan'=> '2016-03-24',
        'waktu'=>'08:00',
        'alasan'=>'kerumah sakit',
        'status'=>'Diterima',
        ]);  

        DB::table('attendance')->insert([
        'id_employee'=> '4',
        'kode_pengajuan'=>'KDI004',
        'jenis'=>'izin datang terlambat',
        'tanggal_permohonan'=> '2015-03-24',
        'waktu'=>'09:00',
        'alasan'=>'kerumah sakit',
        'status'=>'Diterima',

        ]); 

        DB::table('attendance')->insert([
        'id_employee'=> '1',
        'kode_pengajuan'=>'KDI004',
        'jenis'=>'izin datang terlambat',
        'tanggal_permohonan'=> '2017-04-24',
        'waktu'=>'09:00',
        'alasan'=>'kerumah sakit',
        'status'=>'Diterima',

        ]); 

        DB::table('attendance')->insert([
        'id_employee'=> '3',
        'kode_pengajuan'=>'KDI004',
        'jenis'=>'izin datang terlambat',
        'tanggal_permohonan'=> '2016-03-22',
        'waktu'=>'10:00',
        'alasan'=>'kerumah sakit',
        'status'=>'Diterima',

        ]); 

        DB::table('attendance')->insert([
        'id_employee'=> '3',
        'kode_pengajuan'=>'KDI004',
        'jenis'=>'izin datang terlambat',
        'tanggal_permohonan'=> '2017-03-24',
        'waktu'=>'09:00',
        'alasan'=>'kerumah sakit',
        'status'=>'Diterima',

        ]); 

        DB::table('attendance')->insert([
        'id_employee'=> '3',
        'kode_pengajuan'=>'KDI004',
        'jenis'=>'izin datang terlambat',
        'tanggal_permohonan'=> '2016-08-24',
        'waktu'=>'09:00',
        'alasan'=>'Ajak nenek kerumah sakit',
        'status'=>'Diterima',

        ]); 

         DB::table('attendance')->insert([
        'id_employee'=> '1',
        'kode_pengajuan'=>'KDI004',
        'jenis'=>'izin datang terlambat',
        'tanggal_permohonan'=> '2015-08-24',
        'waktu'=>'09:00',
        'alasan'=>'Ajak nenek kerumah sakit',
        'status'=>'Diterima',

        ]); 
    }
}
