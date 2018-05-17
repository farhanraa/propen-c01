<?php

use Illuminate\Database\Seeder;

class KemampuanBahasaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	DB::table('kemampuan_bahasa')->insert([
        'nama_bahasa' => 'Indonesia', 
        'id_employee' => '4', 
        'kemampuan_berbicara' => 'Fasih', 
        'kemampuan_menulis' => 'Fasih'
    	]); 
    }
}
