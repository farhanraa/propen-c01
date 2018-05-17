<?php

use Illuminate\Database\Seeder;

class PengalamanKerjaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('pengalaman_kerja')->insert([
        'nama_perusahaan'=> 'ABC',
        'id_employee'=> '4',
        'jabatan'=> 'Junior sales',
        'jabatan_atasan_langsung'=> 'Executive Sales',
        'ringkasan_jenis_pekerjaan'=> 'Menjual produk',
        'alasan_keluar'=> 'Bosan',
        'gaji_terakhir'=> 'Rp 5.000.000',
        'periode'=> '2016-2017',
     ]);
    }
}