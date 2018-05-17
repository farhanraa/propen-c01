<?php

use Illuminate\Database\Seeder;

class SuratTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
  DB::table('surat')->insert([
        'id_employee'=> '4',
        'nomor'=> '123',
        'jenis'=>'Pengantar',
        'tanggal'=>'2017-01-01',
        'informasi'=>'Surat pengantar untuk ',
     ]);
    }
}