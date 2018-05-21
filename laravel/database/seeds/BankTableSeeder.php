<?php

use Illuminate\Database\Seeder;

class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('bank')->insert([
        'nomor_rekening_bank'=> '11011',
        'id_employee'=> '4',
        'nama_rekening'=> 'Irfin Handi Rekening',
        'nama_bank'=> 'Mandiri',
        'informasi_bank'=> 'Rekening untuk tabungan',
    	]);  
        
        DB::table('bank')->insert([
        'nomor_rekening_bank'=> '11011',
        'id_employee'=> '1',
        'nama_rekening'=> 'Irfin Handi Rekening',
        'nama_bank'=> 'Mandiri',
        'informasi_bank'=> 'Rekening untuk tabungan',
        ]); 
    }
}
