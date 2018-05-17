<?php

use Illuminate\Database\Seeder;

class MutasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('mutasi')->insert([
        'jenis_mutasi'=> 'Jabatan',
        'id_employee'=> '4',
        'id_cabang'=> '3',
        'tanggal_diterima_surat'=> '2016-01-03',
        'id_departemen'=> '3',
        'nama_pekerjaan'=>'Junior Analyst',
        'tanggal_efektif'=> '2016-01-03',
        'nomor_surat'=> '1010',
        'tanggal_surat'=> '2016-01-01',
        'informasi'=> '-',
     ]);
    }
}