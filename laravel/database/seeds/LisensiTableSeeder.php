<?php

use Illuminate\Database\Seeder;

class LisensiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('lisensi')->insert([
        'id_employee'=> '4',
        'nomor'=> '123',
        'jenis_lisensi'=> 'Manajemen Proyek',
        'tanggal'=> '2016-01-01',
        'tanggal_hangus'=> '2019-01-01',
     ]);
    }
}
