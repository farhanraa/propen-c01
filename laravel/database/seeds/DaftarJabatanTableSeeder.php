<?php

use Illuminate\Database\Seeder;

class DaftarJabatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('jabatan')->insert([
            'nama_jabatan'=> 'Commissioner',
            'id_jabatan'=> 'COMM',
            'is_aktif'=>'1',
            'id_golongan'=>'4',
        ]);


        DB::table('jabatan')->insert([
            'nama_jabatan'=> 'Director',
            'id_jabatan'=> 'DIR',
            'is_aktif'=>'1',
            'id_golongan'=>'3',
        ]);


        DB::table('jabatan')->insert([
            'nama_jabatan'=> 'Assosiated Director',
            'id_jabatan'=> 'AD',
            'is_aktif'=>'1',
            'id_golongan'=>'3',
        ]);


        DB::table('jabatan')->insert([
            'nama_jabatan'=> 'Senior Vice President',
            'id_jabatan'=> 'SVP',
            'is_aktif'=>'1',
            'id_golongan'=>'5',
        ]);


        DB::table('jabatan')->insert([
            'nama_jabatan'=> 'Vice President',
            'id_jabatan'=> 'VP',
            'is_aktif'=>'1',
            'id_golongan'=>'5',

        ]);

        DB::table('jabatan')->insert([
            'nama_jabatan'=> 'Assistant Vice President',
            'id_jabatan'=> 'AVP',
            'is_aktif'=>'1',
            'id_golongan'=>'4',
        ]);


        DB::table('jabatan')->insert([
            'nama_jabatan'=> 'Senior Manager',
            'id_jabatan'=> 'SM',
            'is_aktif'=>'1',
            'id_golongan'=>'3',
        ]);


        DB::table('jabatan')->insert([
            'nama_jabatan'=> 'Manager',
            'id_jabatan'=> 'M',
            'is_aktif'=>'1',
            'id_golongan'=>'3',
        ]);


        DB::table('jabatan')->insert([
            'nama_jabatan'=> 'Assistant Manager',
            'id_jabatan'=> 'AM',
            'is_aktif'=>'1',
            'id_golongan'=>'2',
        ]);


        DB::table('jabatan')->insert([
            'nama_jabatan'=> 'Senior Officer',
            'id_jabatan'=> 'SO',
            'is_aktif'=>'1',
            'id_golongan'=>'2',
        ]);


        DB::table('jabatan')->insert([
            'nama_jabatan'=> 'Officer',
            'id_jabatan'=> 'O',
            'is_aktif'=>'1',
            'id_golongan'=>'2',
        ]);


        DB::table('jabatan')->insert([
            'nama_jabatan'=> 'Junior Officer',
            'id_jabatan'=> 'JO',
            'is_aktif'=>'1',
            'id_golongan'=>'2',
        ]);


        DB::table('jabatan')->insert([
            'nama_jabatan'=> 'Administration Support 3',
            'id_jabatan'=> 'AS3',
            'is_aktif'=>'1',
            'id_golongan'=>'1',
        ]);


        DB::table('jabatan')->insert([
            'nama_jabatan'=> 'Administration Support 2',
            'id_jabatan'=> 'AS2',
            'is_aktif'=>'1',
            'id_golongan'=>'1',
        ]);


        DB::table('jabatan')->insert([
            'nama_jabatan'=> 'Administration Support 1',
            'id_jabatan'=> 'AS1',
            'is_aktif'=>'1',
            'id_golongan'=>'1',
        ]);


        DB::table('jabatan')->insert([
            'nama_jabatan'=> 'Supporting Employee 3',
            'id_jabatan'=> 'SE3',
            'is_aktif'=>'1',
            'id_golongan'=>'1',
        ]);

        DB::table('jabatan')->insert([
            'nama_jabatan'=> 'Supporting Employee 2',
            'id_jabatan'=> 'SE2',
            'is_aktif'=>'1',
            'id_golongan'=>'1',
        ]);

        DB::table('jabatan')->insert([
            'nama_jabatan'=> 'Supporting Employee 1',
            'id_jabatan'=> 'SE1',
            'is_aktif'=>'1',
            'id_golongan'=>'1',
        ]);

        DB::table('jabatan')->insert([
            'nama_jabatan'=> 'Supporting',
            'id_jabatan'=> 'NS',
            'is_aktif'=>'1',
            'id_golongan'=>'1',
        ]);
    }
}



