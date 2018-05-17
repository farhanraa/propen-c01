<?php

use Illuminate\Database\Seeder;

class KontakDaruratTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

    	DB::table('kontak_darurat')->insert([
        'id_employee'=>'4',
        'nama_kontak'=>'Suparlan',
        'hubungan_kontak' => 'Abang',
        'no_hp_kontak' => '08183131',
        'no_telepon_kontak'=>'74521',
        'kota_kontak'=>'Depok',
        'provinsi_kontak' => 'Jawa Barat',
        'alamat_kontak' => 'Jl. Mangga',
        'kode_pos_kontak' => '15229',
        ]);
    }
}
