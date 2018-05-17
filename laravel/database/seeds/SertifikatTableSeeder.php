<?php

use Illuminate\Database\Seeder;

class SertifikatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sertifikat')->insert([
        'id_employee' => '4',
        'nama_sertifikat' => 'Sertifikat x', 
        'tahun_sertifikat' => '2016', 
        'penyelenggara' => 'Organisai y', 
        'catatan_sertifikat' => '-', 
        'tingkat_sertifikat' => 'Indonesia'
    	]); 
    }
}
