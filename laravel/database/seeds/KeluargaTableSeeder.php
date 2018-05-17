<?php

use Illuminate\Database\Seeder;

class KeluargaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
     DB::table('keluarga')->insert([
        'nama'=> 'Yanto',
        'id_employee'=> '4',
        'hubungan'=> 'Anak',
        'tempat_lahir'=> 'Boston',
        'tanggal_lahir'=> '2017-01-01',
        'jenis_kelamin'=> 'L',
        'pekerjaan'=> '-',
        'pendidikan'=> 'TK',
     ]);
    }
}