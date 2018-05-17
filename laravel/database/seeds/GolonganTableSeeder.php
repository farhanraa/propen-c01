<?php

use Illuminate\Database\Seeder;

class GolonganTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('golongan')->insert([
        'id_golongan'=> 'JB0001',
        'nama_golongan'=>'I',
        'is_aktif'=>'1',
        ]);

        DB::table('golongan')->insert([
        'id_golongan'=> 'JB0002',
        'nama_golongan'=>'II',
        'is_aktif'=>'1',
        ]);

        DB::table('golongan')->insert([
        'id_golongan'=> 'JB0003',
        'nama_golongan'=>'III',
        'is_aktif'=>'1',
        ]);

        DB::table('golongan')->insert([
        'id_golongan'=> 'JB0004',
        'nama_golongan'=>'IV',
        'is_aktif'=>'1',
        ]);

        DB::table('golongan')->insert([
        'id_golongan'=> 'JB0005',
        'nama_golongan'=>'V',
        'is_aktif'=>'1',
        ]);

    }
}
