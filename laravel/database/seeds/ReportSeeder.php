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
        'kode_report' => 'R101201801',
        'jenis_report' => 'Izin', 
        'bulan' => 'Januari', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '5', 
        'total_pengajuan_diterima' => '5',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '0'
    	]); 

        DB::table('report')->insert([
        'kode_report' => 'R102201801',
        'jenis_report' => 'Izin', 
        'bulan' => 'Februari', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '5', 
        'total_pengajuan_diterima' => '5',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R103201801',
        'jenis_report' => 'Izin', 
        'bulan' => 'Maret', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '5', 
        'total_pengajuan_diterima' => '5',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R101201802',
        'jenis_report' => 'Izin', 
        'bulan' => 'Januari', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '5', 
        'total_pengajuan_diterima' => '5',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R102201802',
        'jenis_report' => 'Izin', 
        'bulan' => 'Februari', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '5', 
        'total_pengajuan_diterima' => '5',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R103201802',
        'jenis_report' => 'Izin', 
        'bulan' => 'Maret', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '5', 
        'total_pengajuan_diterima' => '5',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '0'
        ]);


        DB::table('report')->insert([
        'kode_report' => 'R201201801',
        'jenis_report' => 'Cuti', 
        'bulan' => 'Januari', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '5', 
        'total_pengajuan_diterima' => '5',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '0'
        ]); 

        DB::table('report')->insert([
        'kode_report' => 'R202201801',
        'jenis_report' => 'Cuti', 
        'bulan' => 'Februari', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '5', 
        'total_pengajuan_diterima' => '3',
        'total_pengajuan_ditolak' => '2',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '0'
        ]); 

        DB::table('report')->insert([
        'kode_report' => 'R203201801',
        'jenis_report' => 'Cuti', 
        'bulan' => 'Maret', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '5', 
        'total_pengajuan_diterima' => '4',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '1',
        'total_nominal' => '0'
        ]); 

        DB::table('report')->insert([
        'kode_report' => 'R201201802',
        'jenis_report' => 'Cuti', 
        'bulan' => 'Januari', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '5', 
        'total_pengajuan_diterima' => '5',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '0'
        ]); 

        DB::table('report')->insert([
        'kode_report' => 'R202201802',
        'jenis_report' => 'Cuti', 
        'bulan' => 'Februari', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '5', 
        'total_pengajuan_diterima' => '5',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R203201802',
        'jenis_report' => 'Cuti', 
        'bulan' => 'Maret', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '5', 
        'total_pengajuan_diterima' => '5',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R301201801',
        'jenis_report' => 'Lembur', 
        'bulan' => 'Januari', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '10', 
        'total_pengajuan_diterima' => '8',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '2',
        'total_nominal' => '0'
        ]); 

        DB::table('report')->insert([
        'kode_report' => 'R302201801',
        'jenis_report' => 'Lembur', 
        'bulan' => 'Februari', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '10', 
        'total_pengajuan_diterima' => '7',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '3',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R303201801',
        'jenis_report' => 'Lembur', 
        'bulan' => 'Maret', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '10', 
        'total_pengajuan_diterima' => '9',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '1',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R301201802',
        'jenis_report' => 'Lembur', 
        'bulan' => 'Januari', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '15', 
        'total_pengajuan_diterima' => '13',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '2',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R302201802',
        'jenis_report' => 'Lembur', 
        'bulan' => 'Februari', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '15', 
        'total_pengajuan_diterima' => '12',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '3',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R303201802',
        'jenis_report' => 'Lembur', 
        'bulan' => 'Maret', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '15', 
        'total_pengajuan_diterima' => '13',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '2',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R401201801',
        'jenis_report' => 'Claim', 
        'bulan' => 'Januari', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '5', 
        'total_pengajuan_diterima' => '5',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '1200000'
        ]); 

        DB::table('report')->insert([
        'kode_report' => 'R402201801',
        'jenis_report' => 'Claim', 
        'bulan' => 'Februari', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '3', 
        'total_pengajuan_diterima' => '2',
        'total_pengajuan_ditolak' => '1',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '2000000'
        ]); 

        DB::table('report')->insert([
        'kode_report' => 'R403201801',
        'jenis_report' => 'Claim', 
        'bulan' => 'Maret', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '2', 
        'total_pengajuan_diterima' => '2',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '600000'
        ]); 

        DB::table('report')->insert([
        'kode_report' => 'R401201802',
        'jenis_report' => 'Claim', 
        'bulan' => 'Januari', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '1', 
        'total_pengajuan_diterima' => '1',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '1200000'
        ]); 

        DB::table('report')->insert([
        'kode_report' => 'R402201802',
        'jenis_report' => 'Claim', 
        'bulan' => 'Februari', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '1', 
        'total_pengajuan_diterima' => '1',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '1000000'
        ]); 

        DB::table('report')->insert([
        'kode_report' => 'R403201802',
        'jenis_report' => 'Claim', 
        'bulan' => 'Maret', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '1', 
        'total_pengajuan_diterima' => '1',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '1200000'
        ]); 
    
    

    
    }
}

