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
        'id_fingerprint'=> '1',
        'tanggal'=> '2002-03-18',
        'jam_datang'=>'07:58:59',
        'jam_pulang'=>'17:11:00',
        'status'=>'Disetujui',
        'keterangan'=>NULL,
        'overtime'=> NULL,
    	]);  


    	DB::table('absensi')->insert([
        'id_fingerprint'=> '2',
        'tanggal'=> '2002-03-18',
        'jam_datang'=>'08:13:07',
        'jam_pulang'=>'17:23:00',
        'status'=>'Disetujui',
        'keterangan'=>NULL,
        'overtime'=> NULL,
    	]);

    	DB::table('absensi')->insert([
        'id_fingerprint'=> '5',
        'tanggal'=> '2002-03-18',
        'jam_datang'=>'09:12:07',
        'jam_pulang'=>'19:22:00',
        'status'=>'Disetujui',
        'keterangan'=>NULL,
        'overtime'=> NULL,
    	]);

    	DB::table('absensi')->insert([
        'id_fingerprint'=> '4',
        'tanggal'=> '2002-03-18',
        'jam_datang'=>'07:53:07',
        'jam_pulang'=>'17:23:00',
        'status'=>'Disetujui',
        'keterangan'=>NULL,
        'overtime'=> NULL,
    	]);

    	DB::table('absensi')->insert([
        'id_fingerprint'=> '3',
        'tanggal'=> '2002-03-18',
        'jam_datang'=>'08:15:07',
        'jam_pulang'=>'17:25:00',
        'status'=>'Disetujui',
        'keterangan'=>NULL,
        'overtime'=> NULL,
    	]);

    }
}
