<?php

use Illuminate\Database\Seeder;

class PeraturanKlaimTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('peraturan_klaim')->insert([
        'id_klaim'=> 'C0001',
        'jenis'=>'kacamata',
        'id_peraturan'=>'1',
        'nominal_klaim'=>'100000',
    	'tanggal_awal'=>'2017-01-01',
    	'tanggal_akhir'=>'2018-01-01',
    	'tanggal_hangus'=>'2018-07-01',
    	'is_berlaku'=>'1',
    	]);

    	DB::table('peraturan_klaim')->insert([
        'id_klaim'=> 'C0002',
        'jenis'=>'kacamata',
        'id_peraturan'=>'2',
        'nominal_klaim'=>'200000',
    	'tanggal_awal'=>'2017-01-01',
        'tanggal_akhir'=>'2018-01-01',
        'tanggal_hangus'=>'2018-07-01',
        'is_berlaku'=>'1',
    	]);

    	DB::table('peraturan_klaim')->insert([
        'id_klaim'=> 'C0003',
        'jenis'=>'kacamata',
        'id_peraturan'=>'3',
        'nominal_klaim'=>'300000',
    	'tanggal_awal'=>'2017-01-01',
        'tanggal_akhir'=>'2018-01-01',
        'tanggal_hangus'=>'2018-07-01',
        'is_berlaku'=>'1',
    	]);

    	DB::table('peraturan_klaim')->insert([
        'id_klaim'=> 'C0004',
        'jenis'=>'kacamata',
        'id_peraturan'=>'4',
        'nominal_klaim'=>'500000',
    	'tanggal_awal'=>'2017-01-01',
        'tanggal_akhir'=>'2018-01-01',
        'tanggal_hangus'=>'2018-07-01',
        'is_berlaku'=>'1',
    	]);

    	DB::table('peraturan_klaim')->insert([
        'id_klaim'=> 'C0005',
        'jenis'=>'kacamata',
        'id_peraturan'=>'5',
        'nominal_klaim'=>'1000000',
    	'tanggal_awal'=>'2017-01-01',
        'tanggal_akhir'=>'2018-01-01',
        'tanggal_hangus'=>'2018-07-01',
        'is_berlaku'=>'1',
    	]);

        DB::table('peraturan_klaim')->insert([
        'id_klaim'=> 'C0006',
        'jenis'=>'kehamilan',
        'id_peraturan'=>'1',
        'nominal_klaim'=>'3000000',
        'tanggal_awal'=>'2017-01-01',
        'tanggal_akhir'=>'2018-01-01',
        'tanggal_hangus'=>'2018-07-01',
        'is_berlaku'=>'1',
        ]);

        DB::table('peraturan_klaim')->insert([
        'id_klaim'=> 'C0007',
        'jenis'=>'kehamilan',
        'id_peraturan'=>'2',
        'nominal_klaim'=>'4000000',
        'tanggal_awal'=>'2017-01-01',
        'tanggal_akhir'=>'2018-01-01',
        'tanggal_hangus'=>'2018-07-01',
        'is_berlaku'=>'1',
        ]);

        DB::table('peraturan_klaim')->insert([
        'id_klaim'=> 'C0008',
        'jenis'=>'kehamilan',
        'id_peraturan'=>'3',
        'nominal_klaim'=>'5000000',
        'tanggal_awal'=>'2017-01-01',
        'tanggal_akhir'=>'2018-01-01',
        'tanggal_hangus'=>'2018-07-01',
        'is_berlaku'=>'1',
        ]);

        DB::table('peraturan_klaim')->insert([
        'id_klaim'=> 'C0009',
        'jenis'=>'kehamilan',
        'id_peraturan'=>'4',
        'nominal_klaim'=>'6000000',
        'tanggal_awal'=>'2017-01-01',
        'tanggal_akhir'=>'2018-01-01',
        'tanggal_hangus'=>'2018-07-01',
        'is_berlaku'=>'1',
        ]);

        DB::table('peraturan_klaim')->insert([
        'id_klaim'=> 'C0010',
        'jenis'=>'kehamilan',
        'id_peraturan'=>'5',
        'nominal_klaim'=>'7000000',
        'tanggal_awal'=>'2017-01-01',
        'tanggal_akhir'=>'2018-01-01',
        'tanggal_hangus'=>'2018-07-01',
        'is_berlaku'=>'1',
        ]);

        DB::table('peraturan_klaim')->insert([
        'id_klaim'=> 'C0011',
        'jenis'=>'obat-obatan',
        'id_peraturan'=>'1',
        'nominal_klaim'=>'1000000',
        'tanggal_awal'=>'2017-01-01',
        'tanggal_akhir'=>'2018-01-01',
        'tanggal_hangus'=>'2018-07-01',
        'is_berlaku'=>'1',
        ]);

        DB::table('peraturan_klaim')->insert([
        'id_klaim'=> 'C0012',
        'jenis'=>'obat-obatan',
        'id_peraturan'=>'2',
        'nominal_klaim'=>'1500000',
        'tanggal_awal'=>'2017-01-01',
        'tanggal_akhir'=>'2018-01-01',
        'tanggal_hangus'=>'2018-07-01',
        'is_berlaku'=>'1',
        ]);

        DB::table('peraturan_klaim')->insert([
        'id_klaim'=> 'C0013',
        'jenis'=>'obat-obatan',
        'id_peraturan'=>'3',
        'nominal_klaim'=>'2000000',
        'tanggal_awal'=>'2017-01-01',
        'tanggal_akhir'=>'2018-01-01',
        'tanggal_hangus'=>'2018-07-01',
        'is_berlaku'=>'1',
        ]);

        DB::table('peraturan_klaim')->insert([
        'id_klaim'=> 'C0014',
        'jenis'=>'obat-obatan',
        'id_peraturan'=>'4',
        'nominal_klaim'=>'2500000',
        'tanggal_awal'=>'2017-01-01',
        'tanggal_akhir'=>'2018-01-01',
        'tanggal_hangus'=>'2018-07-01',
        'is_berlaku'=>'1',
        ]);

        DB::table('peraturan_klaim')->insert([
        'id_klaim'=> 'C0015',
        'jenis'=>'obat-obatan',
        'id_peraturan'=>'5',
        'nominal_klaim'=>'300000',
        'tanggal_awal'=>'2017-01-01',
        'tanggal_akhir'=>'2018-01-01',
        'tanggal_hangus'=>'2018-07-01',
        'is_berlaku'=>'1',
        ]);
    }
}
