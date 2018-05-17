<?php

use Illuminate\Database\Seeder;

class JabatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('jabatan_karyawan')->insert([
        'id_jabatan'=>'2',
        'nama_jabatan'=>'Direktur',
        'id_employee'=> '1',
        'bagian'=> NULL,
        'posisi'=>NULL,
        'atasan_langsung'=>'Mengantar keponakan ke rumah sakit untuk checkup',
        'tanggal_masuk'=>'2015-02-11',
     'tanggal_pengangkatan'=>'2015-02-12',
     'tanggal_keluar'=>NULL,
     'status_karyawan'=>'1',
     'alasan_berhenti'=>NULL,
     ]);

     DB::table('jabatan_karyawan')->insert([
        'id_jabatan'=>'8',
        'nama_jabatan'=>'Manager',
        'id_employee'=> '2',
        'bagian'=> NULL,
        'posisi'=>NULL,
        'atasan_langsung'=>'Mengantar keponakan ke rumah sakit untuk checkup',
        'tanggal_masuk'=>'2016-02-11',
     'tanggal_pengangkatan'=>'2016-02-17',
     'tanggal_keluar'=>NULL,
     'status_karyawan'=>'1',
     'alasan_berhenti'=>NULL,
     ]);


        DB::table('jabatan_karyawan')->insert([
        'id_jabatan'=>'1',
        'nama_jabatan'=>'Commisioner',
        'id_employee'=> '4',
        'bagian'=> NULL,
        'posisi'=>NULL,
        'atasan_langsung'=>'Mengantar keponakan ke rumah sakit untuk checkup',
        'tanggal_masuk'=>'2016-02-11',
     'tanggal_pengangkatan'=>'2016-02-17',
     'tanggal_keluar'=>NULL,
     'status_karyawan'=>'1',
     'alasan_berhenti'=>NULL,
        ]);
    }
}