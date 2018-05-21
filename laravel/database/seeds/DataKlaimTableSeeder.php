<?php

use Illuminate\Database\Seeder;

class DataKlaimTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('data_klaim')->insert([
        'id_klaim'=> '3',
        'id_employee'=>'3',
        'kode_data_klaim'=>'KDC001',
        'tanggal_transaksi'=>'2017-03-12',
        'nominal_klaim'=>'100000',
        'status'=>'Menunggu Persetujuan HRM',
        'keterangan'=>'memperbaiki kacamata',
        ]);

        DB::table('data_klaim')->insert([
        'id_klaim'=> '3',
        'id_employee'=>'3',
        'kode_data_klaim'=>'KDC002',
        'tanggal_transaksi'=>'2017-03-12',
        'nominal_klaim'=>'200000',
        'status'=>'Menunggu Persetujuan Finance',
        'keterangan'=>'memperbaiki kacamata',
        ]);  

        DB::table('data_klaim')->insert([
        'id_klaim'=> '3',
        'id_employee'=>'3',
        'kode_data_klaim'=>'KDC003',
        'tanggal_transaksi'=>'2017-03-12',
        'nominal_klaim'=>'150000',
        'status'=>'Menunggu Persetujuan HRM',
        'keterangan'=>'memperbaiki kacamata',
        ]);  

        DB::table('data_klaim')->insert([
        'id_klaim'=> '3',
        'id_employee'=>'1',
        'kode_data_klaim'=>'KDC003',
        'tanggal_transaksi'=>'2017-03-12',
        'nominal_klaim'=>'150000',
        'status'=>'Menunggu Persetujuan HoD',
        'keterangan'=>'memperbaiki kacamata',
        ]);   


        DB::table('data_klaim')->insert([
        'id_klaim'=> '3',
        'id_employee'=>'5',
        'kode_data_klaim'=>'KDC003',
        'tanggal_transaksi'=>'2017-03-12',
        'nominal_klaim'=>'150000',
        'status'=>'Menunggu Persetujuan HoD',
        'keterangan'=>'memperbaiki kacamata',
        ]);   


        DB::table('data_klaim')->insert([
        'id_klaim'=> '3',
        'id_employee'=>'1',
        'kode_data_klaim'=>'KDC003',
        'tanggal_transaksi'=>'2016-03-12',
        'nominal_klaim'=>'150000',
        'status'=>'Menunggu Persetujuan HoD',
        'keterangan'=>'memperbaiki kacamata',
        ]);   

        DB::table('data_klaim')->insert([
        'id_klaim'=> '3',
        'id_employee'=>'2',
        'kode_data_klaim'=>'KDC003',
        'tanggal_transaksi'=>'2015-04-11',
        'nominal_klaim'=>'150000',
        'status'=>'Menunggu Persetujuan HoD',
        'keterangan'=>'memperbaiki kacamata',
        ]);   


        DB::table('data_klaim')->insert([
        'id_klaim'=> '3',
        'id_employee'=>'3',
        'kode_data_klaim'=>'KDC003',
        'tanggal_transaksi'=>'2017-03-11',
        'nominal_klaim'=>'150000',
        'status'=>'Menunggu Persetujuan HoD',
        'keterangan'=>'memperbaiki kacamata',
        ]);   
    }
}
