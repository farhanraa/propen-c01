<?php

use Illuminate\Database\Seeder;

class KeluargaOrangTuaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('keluarga_orang_tua')->insert([
        'nama'=> 'Sugimin',
        'id_employee'=> '4',
        'hubungan'=> 'Ayah',
        'tempat_lahir'=> 'Probolinggo',
        'tanggal_lahir'=> '1968-01-01',
        'jenis_kelamin'=> 'L',
        'pekerjaan'=> '-',
        'pendidikan'=> 'S1',
        'no_telepon'=> '123456',
     ]);
    }
}