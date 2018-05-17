<?php

use Illuminate\Database\Seeder;

class PeraturanPengeluaranKlaimTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('peraturan_pengeluaran_klaim')->insert([
        'id_peraturan'=> 'RC0001',
        'id_biaya'=>'A1',
        'id_golongan'=>'1',
        'is_berlaku'=>'1',
    	]);


         DB::table('peraturan_pengeluaran_klaim')->insert([
        'id_peraturan'=> 'RC0002',
        'id_biaya'=>'A2',
        'id_golongan'=>'2',
        'is_berlaku'=>'1',
    	]);

        DB::table('peraturan_pengeluaran_klaim')->insert([
        'id_peraturan'=> 'RC0003',
        'id_biaya'=>'A3',
        'id_golongan'=>'3',
        'is_berlaku'=>'1',
    	]);

    	DB::table('peraturan_pengeluaran_klaim')->insert([
        'id_peraturan'=> 'RC0004',
        'id_biaya'=>'A4',
        'id_golongan'=>'4',
        'is_berlaku'=>'1',
    	]);

    	DB::table('peraturan_pengeluaran_klaim')->insert([
        'id_peraturan'=> 'RC0005',
        'id_biaya'=>'A5',
        'id_golongan'=>'5',
        'is_berlaku'=>'1',
    	]);
    }
}
