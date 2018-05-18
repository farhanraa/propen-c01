<?php
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('report')->insert([
        'kode_report' => 'R1042018',
        'jenis_report' => 'Izin', 
        'bulan' => 'April', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '20', 
        'total_pengajuan_diterima' => '12',
        'total_pengajuan_ditolak' => '2',
        'total_pengajuan_dibatalkan' => '6',
        'total_nominal' => '-'
    	]); 
        DB::table('report')->insert([
        'kode_report' => 'R2042018',
        'jenis_report' => 'Cuti', 
        'bulan' => 'April', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '5', 
        'total_pengajuan_diterima' => '5',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '-'
        ]); 

        DB::table('report')->insert([
        'kode_report' => 'R3042018',
        'jenis_report' => 'Lembur', 
        'bulan' => 'April', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '2', 
        'total_pengajuan_diterima' => '0',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '-'
        ]); 

        DB::table('report')->insert([
        'kode_report' => 'R4042018',
        'jenis_report' => 'Claim', 
        'bulan' => 'April', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '5', 
        'total_pengajuan_diterima' => '0',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '1200000'
        ]); 
    }
}

