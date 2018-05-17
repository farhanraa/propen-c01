<?php

use Illuminate\Database\Seeder;

class CabangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cabang')->insert([
        'id_cabang'=> 'C0038',
        'nama_cabang'=> 'BANDUNG',
        'contact_person'=>'Helfa',
        'no_handphone'=>NULL,
        'is_aktif'=>'1',
    	]);	

    	DB::table('cabang')->insert([
        'id_cabang'=> 'JKT6',
        'nama_cabang'=> 'Jakarta 6',
        'contact_person'=>NULL,
        'no_handphone'=>NULL,
        'is_aktif'=>'1',
    	]);    

        DB::table('cabang')->insert([
        'id_cabang'=> 'JKT1',
        'nama_cabang'=> 'Jakarta 1',
        'contact_person'=>NULL,
        'no_handphone'=>NULL,
        'is_aktif'=>'1',
        ]);   

    	DB::table('cabang')->insert([
        'id_cabang'=> 'PIPM6',
        'nama_cabang'=> 'PIPM - Aceh',
        'contact_person'=>'Andria Vidhiatama',
        'no_handphone'=>'08126942008',
        'is_aktif'=>'1',
    	]);  

    	DB::table('cabang')->insert([
        'id_cabang'=> 'PIPM1',
        'nama_cabang'=> 'PIPM - Bali',
        'contact_person'=>NULL,
        'no_handphone'=>NULL,
        'is_aktif'=>'1',
    	]);       		

    	DB::table('cabang')->insert([
        'id_cabang'=> 'PIPM4',
        'nama_cabang'=> 'PIPM - Balikpapan',
        'contact_person'=>'Daniel Wicaksono',
        'no_handphone'=>'082137371466',
        'is_aktif'=>'1',
    	]);  

    	DB::table('cabang')->insert([
        'id_cabang'=> 'PIPM3',
        'nama_cabang'=> 'PIPM - Kendari',
        'contact_person'=>NULL,
        'no_handphone'=>NULL,
        'is_aktif'=>'1',
    	]);  

    	DB::table('cabang')->insert([
        'id_cabang'=> 'PIPM5',
        'nama_cabang'=> 'PIPM - Medan',
        'contact_person'=>'Rio Lindri Chuaca',
        'no_handphone'=>'085277529247',
        'is_aktif'=>'1',
    	]);  

		DB::table('cabang')->insert([
        'id_cabang'=> 'PIPM2',
        'nama_cabang'=> 'PIPM - Palembang',
        'contact_person'=>NULL,
        'no_handphone'=>NULL,
        'is_aktif'=>'1',
    	]);  
    }
}
