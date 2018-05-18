<?php

use Illuminate\Database\Seeder;

class PendidikanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pendidikan')->insert([
	        'nama_sekolah' => '47 JAKARTA',
	    	'id_employee' => '4',
	    	'tingkat_pendidikan' => 'SMA',
	    	'tahun_masuk' => '2012', 
	    	'tahun_lulus' => '2015', 
	    	'jurusan' => 'IPA', 
	    	'IPK' => '-',
	    	'catatan' => '-'
    	]); 

    	 DB::table('pendidikan')->insert([
	        'nama_sekolah' => 'Universitas Indonesia',
	    	'id_employee' => '4',
	    	'tingkat_pendidikan' => 'S1',
	    	'tahun_masuk' => '2015', 
	    	'tahun_lulus' => '-', 
	    	'jurusan' => 'Sistem Informasi', 
	    	'IPK' => '-',
	    	'catatan' => '-'
    	]); 
    }
}
