<?php

use Illuminate\Database\Seeder;

class KlaimKaryawanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('klaim_karyawan')->insert([
        'id_klaim'=>'4',
        'id_employee'=>'1',
        'sisa_klaim'=>'500000',
        ]);

        DB::table('klaim_karyawan')->insert([
        'id_klaim'=>'3',
        'id_employee'=>'2',
        'sisa_klaim'=>'300000',
        ]);

        DB::table('klaim_karyawan')->insert([
        'id_klaim'=>'3',
        'id_employee'=>'3',
        'sisa_klaim'=>'300000',
        ]);

        DB::table('klaim_karyawan')->insert([
        'id_klaim'=>'8',
        'id_employee'=>'3',
        'sisa_klaim'=>'5000000',
        ]);

        DB::table('klaim_karyawan')->insert([
        'id_klaim'=>'13',
        'id_employee'=>'3',
        'sisa_klaim'=>'2000000',

        ]);
    }
}
