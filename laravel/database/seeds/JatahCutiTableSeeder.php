<?php

use Illuminate\Database\Seeder;

class JatahCutiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('jatah_cuti')->insert([
        'id_jenis'=> '1',
        'id_employee'=>'1',
        'tanggal_awal'=>'2018-02-15',
        'tanggal_akhir'=>'2019-02-15',
        'tanggal_hangus'=>'2019-08-15',
        'sisa_cuti'=>'12',
        'is_berlaku'=>'1',
        ]);

        DB::table('jatah_cuti')->insert([
        'id_jenis'=> '6',
        'id_employee'=>'2',
        'tanggal_awal'=>'2017-12-25',
        'tanggal_akhir'=>'2018-12-25',
        'tanggal_hangus'=>'2018-06-25',
        'sisa_cuti'=>'12',
        'is_berlaku'=>'1',
        ]);
        
         DB::table('jatah_cuti')->insert([
        'id_jenis'=> '6',
        'id_employee'=>'4',
        'tanggal_awal'=>'2017-12-25',
        'tanggal_akhir'=>'2018-12-25',
    	'tanggal_hangus'=>'2018-06-25',
    	'sisa_cuti'=>'12',
    	'is_berlaku'=>'1',
    	]);
    }
}
