<?php

use Illuminate\Database\Seeder;

class KedisiplinanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('kedisiplinan')->insert([
        'id_employee'=> '4',
        'masa_berlaku'=> '6',
        'jenis'=>'Peer',
        'subjek'=>'Review performa kinerja',
        'review'=>'Tolong ditingkatkan lagi kerjasamanya',
        'keterangan'=>'-',
     ]);
    }
}