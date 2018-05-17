<?php

use Illuminate\Database\Seeder;

class DepartemenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('departemen')->insert([
            'id_departemen'=> 'D003',
            'nama_departemen'=> 'FINANCE',
            'sub_departemen'=> 'SS',
            'is_aktif'=>'1',
        ]);

         DB::table('departemen')->insert([
            'id_departemen'=> 'D006',
            'nama_departemen'=> 'HRD & GS',
            'sub_departemen'=> 'SS',
            'is_aktif'=>'1',
        ]);

        DB::table('departemen')->insert([
            'id_departemen'=> 'D007',
            'nama_departemen'=> 'INFORMATION TECHNOLOGY',
            'sub_departemen'=> 'SS',
            'is_aktif'=>'1',
        ]);

        DB::table('departemen')->insert([
            'id_departemen'=> 'D010',
            'nama_departemen'=> 'SETTLEMENT AND CUSTODY',
            'sub_departemen'=> 'SS',
            'is_aktif'=>'1',
        ]);

        DB::table('departemen')->insert([
            'id_departemen'=> 'D057',
            'nama_departemen'=> 'KYC UNIT',
            'sub_departemen'=> 'SS',
            'is_aktif'=>'1',
        ]);

        DB::table('departemen')->insert([
            'id_departemen'=> 'D025',
            'nama_departemen'=> 'MARKETING AND RETAIL',
            'sub_departemen'=> 'AM',
            'is_aktif'=>'1',
        ]);

        DB::table('departemen')->insert([
            'id_departemen'=> 'D050',
            'nama_departemen'=> 'PRODUCT AND BUSINESS DEVELOPMENT',
            'sub_departemen'=> 'SS',
            'is_aktif'=>'1',
        ]);

        DB::table('departemen')->insert([
            'id_departemen'=> 'D051',
            'nama_departemen'=> 'FUND OPERATION',
            'sub_departemen'=> 'SS',
            'is_aktif'=>'1',
        ]);

        DB::table('departemen')->insert([
            'id_departemen'=> 'D052',
            'nama_departemen'=> 'CUSTOMER COMPLAIN HANDLING UNIT',
            'sub_departemen'=> 'SS',
            'is_aktif'=>'1',
        ]);

        DB::table('departemen')->insert([
            'id_departemen'=> 'D053',
            'nama_departemen'=> 'EQUITY CORPORATE',
            'sub_departemen'=> 'SS',
            'is_aktif'=>'1',
        ]);
    }
}
