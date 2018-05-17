<?php

use Illuminate\Database\Seeder;

class KontrakPercobaanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	DB::table('kontrak_percobaan')->insert([
        'jenis' => 'Kontrak', 
        'id_employee' =>'4',
        'keterangan' => '-',
        'jangka_waktu' => '6',
        'tanggal_awal' => '2015-01-01', 
        'tanggal_akhir' => '2015-07-01'
    	]); 
    }
}
