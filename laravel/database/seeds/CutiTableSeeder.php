<?php

use Illuminate\Database\Seeder;

class CutiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('cuti')->insert([
        'id_jenis'=> '1',
        'id_employee'=>'1',
        'tanggal_mulai'=>'2018-02-15',
        'tanggal_selesai'=>'2019-02-15',
    	'alasan'=>'acara keluarga di luar kota',
    	'alamat'=>'Jalan Baru',
    	'no_telepon'=>'087828881293',
    	'pegawai_pengganti'=>'Haryono',
    	'status'=>'Diterima',

    	]);


         DB::table('cuti')->insert([
        'id_jenis'=> '1',
        'id_employee'=>'2',
        'tanggal_mulai'=>'2018-02-01',
        'tanggal_selesai'=>'2018-02-18',
    	'alasan'=>'ibadah umroh',
    	'alamat'=>'Jalan Merdeka',
    	'no_telepon'=>'082566277178',
    	'pegawai_pengganti'=>'Herni',
    	'status'=>'Menunggu Persetujuan HoD',
    	]);

         DB::table('cuti')->insert([
        'id_jenis'=> '1',
        'id_employee'=>'3',
        'tanggal_mulai'=>'2018-02-01',
        'tanggal_selesai'=>'2018-02-03',
        'alasan'=>'acara keluarga di luar kota',
        'alamat'=>'Jalan Merdeka',
        'no_telepon'=>'082566277111',
        'pegawai_pengganti'=>'Andika',
        'status'=>'Menunggu Persetujuan HoD',
        ]);


         DB::table('cuti')->insert([
        'id_jenis'=> '1',
        'id_employee'=>'4',
        'tanggal_mulai'=>'2018-06-01',
        'tanggal_selesai'=>'2018-06-18',
        'alasan'=>'ibadah umroh',
        'alamat'=>'Jalan Merdeka',
        'no_telepon'=>'082566222111',
        'pegawai_pengganti'=>'Ibnu',
        'status'=>'Menunggu Persetujuan HoD',
        ]);        


        DB::table('cuti')->insert([
        'id_jenis'=> '1',
        'id_employee'=>'5',
        'tanggal_mulai'=>'2018-05-04',
        'tanggal_selesai'=>'2018-05-15',
        'alasan'=>'kontrol ke rumah sakit',
        'alamat'=>'Jalan Merdeka',
        'no_telepon'=>'089921177121',
        'pegawai_pengganti'=>'Caca',
        'status'=>'Menunggu Persetujuan HoD',

        ]); 


        DB::table('cuti')->insert([
        'id_jenis'=> '1',
        'id_employee'=>'1',
        'tanggal_mulai'=>'2017-05-04',
        'tanggal_selesai'=>'2017-05-15',
        'alasan'=>'kontrol ke rumah sakit',
        'alamat'=>'Jalan Merdeka',
        'no_telepon'=>'089921177121',
        'pegawai_pengganti'=>'Caca',
        'status'=>'Menunggu Persetujuan HoD',

        ]);        


        DB::table('cuti')->insert([
        'id_jenis'=> '1',
        'id_employee'=>'2',
        'tanggal_mulai'=>'2017-04-04',
        'tanggal_selesai'=>'2017-04-15',
        'alasan'=>'kontrol ke rumah sakit',
        'alamat'=>'Jalan Merdeka',
        'no_telepon'=>'089921177121',
        'pegawai_pengganti'=>'Dara',
        'status'=>'Menunggu Persetujuan HoD',

        ]); 


        DB::table('cuti')->insert([
        'id_jenis'=> '1',
        'id_employee'=>'4',
        'tanggal_mulai'=>'2018-05-11',
        'tanggal_selesai'=>'2018-05-15',
        'alasan'=>'Rawat inap di rumah sakit',
        'alamat'=>'Jalan Merdeka',
        'no_telepon'=>'089921177121',
        'pegawai_pengganti'=>'Caca',
        'status'=>'Menunggu Persetujuan HRM',

        ]); 


        DB::table('cuti')->insert([
        'id_jenis'=> '1',
        'id_employee'=>'3',
        'tanggal_mulai'=>'2017-05-11',
        'tanggal_selesai'=>'2017-05-15',
        'alasan'=>'Rawat inap di rumah sakit',
        'alamat'=>'Jalan Merdeka',
        'no_telepon'=>'089921177121',
        'pegawai_pengganti'=>'Caca',
        'status'=>'Menunggu Persetujuan HRM',

        ]); 

        DB::table('cuti')->insert([
        'id_jenis'=> '1',
        'id_employee'=>'3',
        'tanggal_mulai'=>'2017-06-11',
        'tanggal_selesai'=>'2017-06-15',
        'alasan'=>'Rawat inap di rumah sakit',
        'alamat'=>'Jalan Merdeka',
        'no_telepon'=>'089921177121',
        'pegawai_pengganti'=>'Lala',
        'status'=>'Menunggu Persetujuan HRM',

        ]);

        DB::table('cuti')->insert([
        'id_jenis'=> '1',
        'id_employee'=>'1',
        'tanggal_mulai'=>'2016-06-10',
        'tanggal_selesai'=>'2016-06-14',
        'alasan'=>'Rawat inap di rumah sakit',
        'alamat'=>'Jalan Merdeka',
        'no_telepon'=>'089921177121',
        'pegawai_pengganti'=>'Lala',
        'status'=>'Menunggu Persetujuan HoD',

        ]); 
    }
}
