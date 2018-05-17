<?php

use Illuminate\Database\Seeder;

class PengalamanBerorganisasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pengalaman_berorganisasi')->insert([
        'nama_organisasi' => 'HIPMI',
        'id_employee' => '4', 
        'jenis_organisasi' => 'Binsis', 
        'jabatan' => 'anggota', 
        'tahun_aktif' => '2014-2016'
    	]);  
    }
}
