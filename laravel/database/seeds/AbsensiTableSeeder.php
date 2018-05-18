<?php

use Illuminate\Database\Seeder;

class AbsensiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        DB::table('absensi')->insert([
        'id_employee'=> '1',
        'nama_cabang'=> 'BANDUNG',
        'tanggal'=> '2002-03-18',
        'jam_datang'=>'07:58:59',
        'jam_pulang'=>'17:11:00',
        'keterangan'=>NULL,
        'overtime'=> NULL,
        ]);  


        DB::table('absensi')->insert([
        'id_employee'=> '2',
        'nama_cabang'=> 'BANDUNG',
        'tanggal'=> '2002-03-18',
        'jam_datang'=>'07:58:59',
        'jam_pulang'=>'17:11:00',
        'keterangan'=>NULL,
        'overtime'=> NULL,
        ]);

        DB::table('absensi')->insert([
        'id_employee'=> '3',
        'nama_cabang'=> 'BANDUNG',
        'tanggal'=> '2002-03-18',
        'jam_datang'=>'07:58:59',
        'jam_pulang'=>'17:11:00',
        'keterangan'=>NULL,
        'overtime'=> NULL,
        ]);

        DB::table('absensi')->insert([
        'id_employee'=> '4',
        'nama_cabang'=> 'BANDUNG',
        'tanggal'=> '2002-03-18',
        'jam_datang'=>'07:58:59',
        'jam_pulang'=>'17:11:00',
        'keterangan'=>NULL,
        'overtime'=> NULL,
        ]);

        DB::table('absensi')->insert([
        'id_employee'=> '5',
        'nama_cabang'=> 'BANDUNG',
        'tanggal'=> '2002-03-18',
        'jam_datang'=>'07:58:59',
        'jam_pulang'=>'17:11:00',
        'keterangan'=>NULL,
        'overtime'=> NULL,
        ]);

    }
}
