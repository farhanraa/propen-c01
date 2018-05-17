<?php

use Illuminate\Database\Seeder;


class HobiDanPrestasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('hobi_dan_prestasi')->insert([
			'hobi' => 'Main Karambol',
			'id_employee' => '4',
			'prestasi' => 'Juara 1 Tingkat RT',
    	]);  
    }
}
