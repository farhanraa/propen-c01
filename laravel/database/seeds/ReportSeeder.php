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
        //izin awal
        //cabang 1
        DB::table('report')->insert([
        'kode_report' => 'R111201701',
        'jenis_report' => 'Izin', 
        'bulan' => 'November', 
        'tahun' => '2017', 
        'id_cabang' => '1', 
        'total_pengajuan' => '20', 
        'total_pengajuan_diterima' => '17',
        'total_pengajuan_ditolak' => '2',
        'total_pengajuan_dibatalkan' => '1',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R112201701',
        'jenis_report' => 'Izin', 
        'bulan' => 'Desember', 
        'tahun' => '2017', 
        'id_cabang' => '1', 
        'total_pengajuan' => '25', 
        'total_pengajuan_diterima' => '20',
        'total_pengajuan_ditolak' => '5',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R101201801',
        'jenis_report' => 'Izin', 
        'bulan' => 'Januari', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '22', 
        'total_pengajuan_diterima' => '21',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '1',
        'total_nominal' => '0'
        ]); 

        DB::table('report')->insert([
        'kode_report' => 'R102201801',
        'jenis_report' => 'Izin', 
        'bulan' => 'Februari', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '28', 
        'total_pengajuan_diterima' => '25',
        'total_pengajuan_ditolak' => '2',
        'total_pengajuan_dibatalkan' => '1',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R103201801',
        'jenis_report' => 'Izin', 
        'bulan' => 'Maret', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '30', 
        'total_pengajuan_diterima' => '20',
        'total_pengajuan_ditolak' => '10',
        'total_pengajuan_dibatalkan' => '5',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R104201801',
        'jenis_report' => 'Izin', 
        'bulan' => 'April', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '27', 
        'total_pengajuan_diterima' => '20',
        'total_pengajuan_ditolak' => '2',
        'total_pengajuan_dibatalkan' => '5',
        'total_nominal' => '0'
        ]);

        //cabang 2
        DB::table('report')->insert([
        'kode_report' => 'R111201702',
        'jenis_report' => 'Izin', 
        'bulan' => 'November', 
        'tahun' => '2017', 
        'id_cabang' => '2', 
        'total_pengajuan' => '10', 
        'total_pengajuan_diterima' => '10',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R112201702',
        'jenis_report' => 'Izin', 
        'bulan' => 'Desember', 
        'tahun' => '2017', 
        'id_cabang' => '2', 
        'total_pengajuan' => '20', 
        'total_pengajuan_diterima' => '18',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '2',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R101201802',
        'jenis_report' => 'Izin', 
        'bulan' => 'Januari', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '23', 
        'total_pengajuan_diterima' => '18',
        'total_pengajuan_ditolak' => '3',
        'total_pengajuan_dibatalkan' => '2',
        'total_nominal' => '0'
        ]); 

        DB::table('report')->insert([
        'kode_report' => 'R102201802',
        'jenis_report' => 'Izin', 
        'bulan' => 'Februari', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '18', 
        'total_pengajuan_diterima' => '10',
        'total_pengajuan_ditolak' => '3',
        'total_pengajuan_dibatalkan' => '5',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R103201802',
        'jenis_report' => 'Izin', 
        'bulan' => 'Maret', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '30', 
        'total_pengajuan_diterima' => '28',
        'total_pengajuan_ditolak' => '2',
        'total_pengajuan_dibatalkan' => '1',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R104201802',
        'jenis_report' => 'Izin', 
        'bulan' => 'April', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '33', 
        'total_pengajuan_diterima' => '30',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '3',
        'total_nominal' => '0'
        ]);

        //izin akhir
        //cuti awal

        //cabang 1
        DB::table('report')->insert([
        'kode_report' => 'R211201701',
        'jenis_report' => 'Cuti', 
        'bulan' => 'November', 
        'tahun' => '2017', 
        'id_cabang' => '1', 
        'total_pengajuan' => '30', 
        'total_pengajuan_diterima' => '20',
        'total_pengajuan_ditolak' => '3',
        'total_pengajuan_dibatalkan' => '3',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R212201701',
        'jenis_report' => 'Cuti', 
        'bulan' => 'Desember', 
        'tahun' => '2017', 
        'id_cabang' => '1', 
        'total_pengajuan' => '33', 
        'total_pengajuan_diterima' => '23',
        'total_pengajuan_ditolak' => '8',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R201201801',
        'jenis_report' => 'Cuti', 
        'bulan' => 'Januari', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '31', 
        'total_pengajuan_diterima' => '25',
        'total_pengajuan_ditolak' => '4',
        'total_pengajuan_dibatalkan' => '4',
        'total_nominal' => '0'
        ]); 

        DB::table('report')->insert([
        'kode_report' => 'R202201801',
        'jenis_report' => 'Cuti', 
        'bulan' => 'Februari', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '40', 
        'total_pengajuan_diterima' => '37',
        'total_pengajuan_ditolak' => '3',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R203201801',
        'jenis_report' => 'Cuti', 
        'bulan' => 'Maret', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '50', 
        'total_pengajuan_diterima' => '40',
        'total_pengajuan_ditolak' => '10',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R204201801',
        'jenis_report' => 'Cuti', 
        'bulan' => 'April', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '31', 
        'total_pengajuan_diterima' => '24',
        'total_pengajuan_ditolak' => '4',
        'total_pengajuan_dibatalkan' => '2',
        'total_nominal' => '0'
        ]);

        //cabang 2
        DB::table('report')->insert([
        'kode_report' => 'R211201702',
        'jenis_report' => 'Cuti', 
        'bulan' => 'November', 
        'tahun' => '2017', 
        'id_cabang' => '2', 
        'total_pengajuan' => '30', 
        'total_pengajuan_diterima' => '24',
        'total_pengajuan_ditolak' => '4',
        'total_pengajuan_dibatalkan' => '2',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R212201702',
        'jenis_report' => 'Cuti', 
        'bulan' => 'Desember', 
        'tahun' => '2017', 
        'id_cabang' => '2', 
        'total_pengajuan' => '40', 
        'total_pengajuan_diterima' => '30',
        'total_pengajuan_ditolak' => '4',
        'total_pengajuan_dibatalkan' => '4',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R201201802',
        'jenis_report' => 'Cuti', 
        'bulan' => 'Januari', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '45', 
        'total_pengajuan_diterima' => '42',
        'total_pengajuan_ditolak' => '3',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '0'
        ]); 

        DB::table('report')->insert([
        'kode_report' => 'R202201802',
        'jenis_report' => 'Cuti', 
        'bulan' => 'Februari', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '50', 
        'total_pengajuan_diterima' => '40',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '10',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R203201802',
        'jenis_report' => 'Cuti', 
        'bulan' => 'Maret', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '42', 
        'total_pengajuan_diterima' => '33',
        'total_pengajuan_ditolak' => '7',
        'total_pengajuan_dibatalkan' => '1',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R204201802',
        'jenis_report' => 'Cuti', 
        'bulan' => 'April', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '30', 
        'total_pengajuan_diterima' => '21',
        'total_pengajuan_ditolak' => '5',
        'total_pengajuan_dibatalkan' => '3',
        'total_nominal' => '0'
        ]);

        //cuti akhir
        //lembur awal

        //cabang 1
        DB::table('report')->insert([
        'kode_report' => 'R311201701',
        'jenis_report' => 'Lembur', 
        'bulan' => 'November', 
        'tahun' => '2017', 
        'id_cabang' => '1', 
        'total_pengajuan' => '42', 
        'total_pengajuan_diterima' => '31',
        'total_pengajuan_ditolak' => '10',
        'total_pengajuan_dibatalkan' => '2',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R312201701',
        'jenis_report' => 'Lembur', 
        'bulan' => 'Desember', 
        'tahun' => '2017', 
        'id_cabang' => '1', 
        'total_pengajuan' => '23', 
        'total_pengajuan_diterima' => '18',
        'total_pengajuan_ditolak' => '2',
        'total_pengajuan_dibatalkan' => '1',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R301201801',
        'jenis_report' => 'Lembur', 
        'bulan' => 'Januari', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '20', 
        'total_pengajuan_diterima' => '20',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '0'
        ]); 

        DB::table('report')->insert([
        'kode_report' => 'R302201801',
        'jenis_report' => 'Lembur', 
        'bulan' => 'Februari', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '40', 
        'total_pengajuan_diterima' => '30',
        'total_pengajuan_ditolak' => '8',
        'total_pengajuan_dibatalkan' => '2',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R303201801',
        'jenis_report' => 'Lembur', 
        'bulan' => 'Maret', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '62', 
        'total_pengajuan_diterima' => '50',
        'total_pengajuan_ditolak' => '2',
        'total_pengajuan_dibatalkan' => '10',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R304201801',
        'jenis_report' => 'Lembur', 
        'bulan' => 'April', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '24', 
        'total_pengajuan_diterima' => '20',
        'total_pengajuan_ditolak' => '2',
        'total_pengajuan_dibatalkan' => '2',
        'total_nominal' => '0'
        ]);

        //cabang 2
        DB::table('report')->insert([
        'kode_report' => 'R311201702',
        'jenis_report' => 'Lembur', 
        'bulan' => 'November', 
        'tahun' => '2017', 
        'id_cabang' => '2', 
        'total_pengajuan' => '40', 
        'total_pengajuan_diterima' => '20',
        'total_pengajuan_ditolak' => '20',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R312201702',
        'jenis_report' => 'Lembur', 
        'bulan' => 'Desember', 
        'tahun' => '2017', 
        'id_cabang' => '2', 
        'total_pengajuan' => '44', 
        'total_pengajuan_diterima' => '32',
        'total_pengajuan_ditolak' => '8',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R301201802',
        'jenis_report' => 'Lembur', 
        'bulan' => 'Januari', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '58', 
        'total_pengajuan_diterima' => '30',
        'total_pengajuan_ditolak' => '20',
        'total_pengajuan_dibatalkan' => '8',
        'total_nominal' => '0'
        ]); 

        DB::table('report')->insert([
        'kode_report' => 'R302201802',
        'jenis_report' => 'Lembur', 
        'bulan' => 'Februari', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '28', 
        'total_pengajuan_diterima' => '20',
        'total_pengajuan_ditolak' => '3',
        'total_pengajuan_dibatalkan' => '5',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R303201802',
        'jenis_report' => 'Lembur', 
        'bulan' => 'Maret', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '48', 
        'total_pengajuan_diterima' => '35',
        'total_pengajuan_ditolak' => '10',
        'total_pengajuan_dibatalkan' => '3',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R304201802',
        'jenis_report' => 'Lembur', 
        'bulan' => 'April', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '30', 
        'total_pengajuan_diterima' => '20',
        'total_pengajuan_ditolak' => '5',
        'total_pengajuan_dibatalkan' => '5',
        'total_nominal' => '0'
        ]);

        //lembur akhir
        //claim awal
        //cabang 1
        DB::table('report')->insert([
        'kode_report' => 'R411201701',
        'jenis_report' => 'Claim', 
        'bulan' => 'November', 
        'tahun' => '2017', 
        'id_cabang' => '1', 
        'total_pengajuan' => '20', 
        'total_pengajuan_diterima' => '17',
        'total_pengajuan_ditolak' => '2',
        'total_pengajuan_dibatalkan' => '1',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R412201701',
        'jenis_report' => 'Claim', 
        'bulan' => 'Desember', 
        'tahun' => '2017', 
        'id_cabang' => '1', 
        'total_pengajuan' => '25', 
        'total_pengajuan_diterima' => '20',
        'total_pengajuan_ditolak' => '5',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R401201801',
        'jenis_report' => 'Claim', 
        'bulan' => 'Januari', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '22', 
        'total_pengajuan_diterima' => '21',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '1',
        'total_nominal' => '0'
        ]); 

        DB::table('report')->insert([
        'kode_report' => 'R402201801',
        'jenis_report' => 'Claim', 
        'bulan' => 'Februari', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '28', 
        'total_pengajuan_diterima' => '25',
        'total_pengajuan_ditolak' => '2',
        'total_pengajuan_dibatalkan' => '1',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R403201801',
        'jenis_report' => 'Claim', 
        'bulan' => 'Maret', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '30', 
        'total_pengajuan_diterima' => '20',
        'total_pengajuan_ditolak' => '10',
        'total_pengajuan_dibatalkan' => '5',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R404201801',
        'jenis_report' => 'Claim', 
        'bulan' => 'April', 
        'tahun' => '2018', 
        'id_cabang' => '1', 
        'total_pengajuan' => '27', 
        'total_pengajuan_diterima' => '20',
        'total_pengajuan_ditolak' => '2',
        'total_pengajuan_dibatalkan' => '5',
        'total_nominal' => '0'
        ]);

        //cabang 2
        DB::table('report')->insert([
        'kode_report' => 'R411201702',
        'jenis_report' => 'Claim', 
        'bulan' => 'November', 
        'tahun' => '2017', 
        'id_cabang' => '2', 
        'total_pengajuan' => '10', 
        'total_pengajuan_diterima' => '10',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '0',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R412201702',
        'jenis_report' => 'Claim', 
        'bulan' => 'Desember', 
        'tahun' => '2017', 
        'id_cabang' => '2', 
        'total_pengajuan' => '20', 
        'total_pengajuan_diterima' => '18',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '2',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R401201802',
        'jenis_report' => 'Claim', 
        'bulan' => 'Januari', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '23', 
        'total_pengajuan_diterima' => '18',
        'total_pengajuan_ditolak' => '3',
        'total_pengajuan_dibatalkan' => '2',
        'total_nominal' => '0'
        ]); 

        DB::table('report')->insert([
        'kode_report' => 'R402201802',
        'jenis_report' => 'Claim', 
        'bulan' => 'Februari', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '18', 
        'total_pengajuan_diterima' => '10',
        'total_pengajuan_ditolak' => '3',
        'total_pengajuan_dibatalkan' => '5',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R403201802',
        'jenis_report' => 'Claim', 
        'bulan' => 'Maret', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '30', 
        'total_pengajuan_diterima' => '28',
        'total_pengajuan_ditolak' => '2',
        'total_pengajuan_dibatalkan' => '1',
        'total_nominal' => '0'
        ]);

        DB::table('report')->insert([
        'kode_report' => 'R404201802',
        'jenis_report' => 'Claim', 
        'bulan' => 'April', 
        'tahun' => '2018', 
        'id_cabang' => '2', 
        'total_pengajuan' => '33', 
        'total_pengajuan_diterima' => '30',
        'total_pengajuan_ditolak' => '0',
        'total_pengajuan_dibatalkan' => '3',
        'total_nominal' => '0'
        ]);

        //claim akhir
    }
}

