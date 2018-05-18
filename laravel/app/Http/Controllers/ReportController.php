<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Attendance;
use App\Employee;
use App\Report;
use Mail;
use Log;
use App\Mail\NotifikasiDiterima;
use App\Mail\NotifikasiDitolak;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use SplObjectStorage;
use stdClass;

class ReportController extends Controller{

    public function report(Request $request){

        $employee = Employee::where('id', Auth::user()->id_employee)->first();

        $today = date("Y-m-d");

         $hari_ini = explode('-', $today);
         $year = (int)$hari_ini[0];

         //echo $years;

         $month = (int)$hari_ini[1] -1;
         if($month === 0){
            $month = 12;
            $year = $year - 1;
         }

         $day = $hari_ini[2];

         if($month === 1){

            $bulan = 'Januari';
         }
         else if($month === 2){

            $bulan = 'Februari';
         }

         else if($month === 3){

            $bulan = 'Maret';
         }

         else if($month === 4){

            $bulan = 'April';
         }

         else if($month === 5){

            $bulan = 'Mei';
         }

         else if($month === 6){

            $bulan = 'Juni';
         }

         else if($month === 7){

            $bulan = 'Juli';
         }

         else if($month === 8){

            $bulan = 'Agustus';
         }

         else if($month === 9){

            $bulan = 'September';
         }

         else if($month === 10){

            $bulan = 'Oktober';
         }

         else if($month === 11){

            $bulan = 'November';
         }

         else if($month === 12){

            $bulan = 'Desember';
         }

        $getDate = DB::table("report")
        ->join('cabang' ,'cabang.id' , '=' , 'report.id_cabang')
        ->select('report.*')
        ->where('report.bulan' , $bulan)
        ->where('report.tahun' , ''+$year)
        ->get();



        // generate kode report

        // if($getDate[0]->jenis_report){

        //     $kode_report = 'R1' . ''+$month . ''+$year;
        // }

        // else if($getDate[1]->jenis_report){

        //     $kode_report = 'R2' . ''+$month . ''+$year;
        // }

        // else if($getDate[2]->jenis_report){

        //     $kode_report = 'R3' . ''+$month . ''+$year;
        // }

        // else {

        //     $kode_report = 'R4' . ''+$month . ''+$year;
        // }

        $date_today_awal = $year . '-' . (int)0 . $month . '-' . 01;
        $date_today_akhir = $year . '-' . (int)0 . $month . '-' . 31;

        $convert_date_awal = date("Y-m-d" , strtotime($date_today_awal));
        $convert_date_akhir = date("Y-m-d" , strtotime($date_today_akhir));

       
        if($getDate->isEmpty()){


            //izin 

            $izin = DB::table("attendance")
            ->join('employee' , 'attendance.id_employee' , '=' , 'employee.id')
            ->select('attendance.status' ,'employee.id_cabang', DB::raw('count(attendance.status) as jumlah'))
            ->whereBetween('tanggal_permohonan' , [$convert_date_awal , $convert_date_akhir])
            ->groupBy('attendance.status' ,'employee.id_cabang')
            ->get();

            // echo $izin;

            //semua cabang pada bulan tertentu pasti ada yg izin
            $izin_cabang = DB::table("attendance")
            ->join('employee' , 'attendance.id_employee' , '=' , 'employee.id')
            ->select('employee.id_cabang')
            ->distinct()
            ->orderBy('employee.id_cabang' , 'DESC')
            ->get();

            $dataIzin = '';

            for($i = 0; $i < $izin_cabang->count(); $i++){
                $idCabang = $i + 1;
                // echo 'id' . $idCabang;
                $dataIzin[$idCabang] = array(
                    'total_pengajuan' => 0,
                    'total_pengajuan_diterima' => 0,
                    'total_pengajuan_ditolak' => 0,
                    'total_pengajuan_dibatalkan' => 0,
                );
                for($j = 0; $j < $izin->count(); $j++){
                    if($izin[$j]->id_cabang == $idCabang){
                        // echo '-' . $izin[$j]->id_cabang;
                        // $resultCabang->total_pengajuan
                        if($izin[$j]->status == 'Diterima'){
                            $dataIzin[$idCabang]['total_pengajuan_diterima'] = $izin[$j]->jumlah; 
                            // echo 'id' . $idCabang . 'terima' . $izin[$j]->jumlah; 
                        }
                        else if($izin[$j]->status == 'Ditolak'){
                            $dataIzin[$idCabang]['total_pengajuan_ditolak'] = $izin[$j]->jumlah; 
                        }
                        else if($izin[$j]->status == 'Dibatalkan'){
                            $dataIzin[$idCabang]['total_pengajuan_dibatalkan'] = $izin[$j]->jumlah; 
                        }
                    }
                }
                $dataIzin[$idCabang]['total_pengajuan'] = $dataIzin[$idCabang]['total_pengajuan_diterima'] + 
                                                            $dataIzin[$idCabang]['total_pengajuan_ditolak'] + 
                                                            $dataIzin[$idCabang]['total_pengajuan_dibatalkan'];
            }
                        
            

            for($i = 0; $i < $izin_cabang->count(); $i++){

                $idCabang = $i+1;

                $insert_izin = new Report;

                if($idCabang < 10){
                    $cabang = '0' . $idCabang;
                }

                if($month < 10){
                    $month_izin = '0' . $month;
                }
                $insert_izin->kode_report = 'R1' . $month_izin . $year . $cabang;
                
                $insert_izin->jenis_report = 'Izin';
                $insert_izin->bulan = $bulan;
                $insert_izin->tahun = (string)$year;
                $insert_izin->id_cabang = $idCabang;
                $insert_izin->total_pengajuan = $dataIzin[$idCabang]['total_pengajuan'];
                $insert_izin->total_pengajuan_diterima = $dataIzin[$idCabang]['total_pengajuan_diterima'];
                $insert_izin->total_pengajuan_ditolak = $dataIzin[$idCabang]['total_pengajuan_ditolak'];
                $insert_izin->total_pengajuan_dibatalkan = $dataIzin[$idCabang]['total_pengajuan_dibatalkan'];
                $insert_izin->save();
                //echo $insert_izin->kode_report . 'total pengajuan diterima' . $insert_izin->total_pengajuan_diterima;
            }
            

            //end izin

            // START COMMENT
            $cuti = DB::table("cuti")
            ->join('employee' , 'cuti.id_employee' , '=' , 'employee.id')
            ->select('cuti.status' , 'employee.id_cabang' , DB::raw('count(cuti.status) as jumlah'))
            ->whereBetween('cuti.tanggal_mulai' , [$convert_date_awal , $convert_date_akhir])
            ->whereBetween('cuti.tanggal_selesai' , [$convert_date_awal, $convert_date_akhir])
            ->groupBy('cuti.status' , 'employee.id_cabang')
            ->get();

            $cuti_cabang = DB::table("cuti")
            ->join('employee' , 'cuti.id_employee' , '=' , 'employee.id')
            ->select('employee.id_cabang')
            ->distinct()
            ->orderBy('employee.id_cabang' , 'DESC')
            ->get();

            $dataCuti = '';

            for($i = 0; $i < $cuti_cabang->count(); $i++){
                $idCabang_cuti = $i + 1;
                // echo 'id' . $idCabang;
                $dataCuti[$idCabang_cuti] = array(
                    'total_pengajuan' => 0,
                    'total_pengajuan_diterima' => 0,
                    'total_pengajuan_ditolak' => 0,
                    'total_pengajuan_dibatalkan' => 0,
                );
                for($j = 0; $j < $cuti->count(); $j++){
                    if($cuti[$j]->id_cabang == $idCabang_cuti){
                        // echo '-' . $izin[$j]->id_cabang;
                        // $resultCabang->total_pengajuan
                        if($cuti[$j]->status == 'Diterima'){
                            $dataCuti[$idCabang_cuti]['total_pengajuan_diterima'] = $cuti[$j]->jumlah; 
                            // echo 'id' . $idCabang . 'terima' . $izin[$j]->jumlah; 
                        }
                        else if($cuti[$j]->status == 'Ditolak'){
                            $dataCuti[$idCabang_cuti]['total_pengajuan_ditolak'] = $cuti[$j]->jumlah; 
                        }
                        else if($cuti[$j]->status == 'Dibatalkan'){
                            $dataCuti[$idCabang_cuti]['total_pengajuan_dibatalkan'] = $cuti[$j]->jumlah; 
                        }
                    }
                }
                $dataCuti[$idCabang_cuti]['total_pengajuan'] = $dataCuti[$idCabang_cuti]['total_pengajuan_diterima'] + 
                                                                $dataCuti[$idCabang_cuti]['total_pengajuan_ditolak'] + 
                                                                $dataCuti[$idCabang_cuti]['total_pengajuan_dibatalkan'];
            }
            

            for($i = 0; $i < $cuti_cabang->count(); $i++){

                $idCabang_cuti = $i+1;

                $insert_cuti = new Report;

                if($idCabang_cuti < 10){
                    $cabang_cuti = '0' . $idCabang_cuti;
                }

                if($month < 10){
                    $month_cuti = '0' . $month;
                }
                $insert_cuti->kode_report = 'R2' . $month_cuti . $year . $cabang_cuti;
                
                $insert_cuti->jenis_report = 'Cuti';
                $insert_cuti->bulan = $bulan;
                $insert_cuti->tahun = (string)$year;
                $insert_cuti->id_cabang = $idCabang_cuti;
                $insert_cuti->total_pengajuan = $dataCuti[$idCabang_cuti]['total_pengajuan'];
                $insert_cuti->total_pengajuan_diterima = $dataCuti[$idCabang_cuti]['total_pengajuan_diterima'];
                $insert_cuti->total_pengajuan_ditolak = $dataCuti[$idCabang_cuti]['total_pengajuan_ditolak'];
                $insert_cuti->total_pengajuan_dibatalkan = $dataCuti[$idCabang_cuti]['total_pengajuan_dibatalkan'];
                $insert_cuti->save();
                //echo $insert_izin->kode_report . 'total pengajuan diterima' . $insert_izin->total_pengajuan_diterima;
            }
            
            

            $lembur = DB::table("overtime")
            ->join('employee' , 'overtime.id_employee' , '=' , 'employee.id')
            ->select('overtime.status' , 'employee.id_cabang', DB::raw('count(overtime.status) as jumlah'))
            ->whereBetween('overtime.tanggal' , [$convert_date_awal , $convert_date_akhir])
            ->groupBy('overtime.status' , 'employee.id_cabang')
            ->get();

            $lembur_cabang = DB::table("overtime")
            ->join('employee' , 'overtime.id_employee' , '=' , 'employee.id')
            ->select('employee.id_cabang')
            ->distinct()
            ->orderBy('employee.id_cabang' , 'DESC')
            ->get();

            $dataLembur = '';

            for($i = 0; $i < $lembur_cabang->count(); $i++){
                $idCabang_lembur = $i + 1;
                // echo 'id' . $idCabang;
                $dataLembur[$idCabang_lembur] = array(
                    'total_pengajuan' => 0,
                    'total_pengajuan_diterima' => 0,
                    'total_pengajuan_ditolak' => 0,
                    'total_pengajuan_dibatalkan' => 0,
                );
                for($j = 0; $j < $lembur->count(); $j++){
                    if($lembur[$j]->id_cabang == $idCabang_lembur){
                        // echo '-' . $izin[$j]->id_cabang;
                        // $resultCabang->total_pengajuan
                        if($lembur[$j]->status == 'Diterima'){
                            $dataLembur[$idCabang_lembur]['total_pengajuan_diterima'] = $lembur[$j]->jumlah; 
                            // echo 'id' . $idCabang . 'terima' . $izin[$j]->jumlah; 
                        }
                        else if($lembur[$j]->status == 'Ditolak'){
                            $dataLembur[$idCabang_lembur]['total_pengajuan_ditolak'] = $lembur[$j]->jumlah; 
                        }
                        else if($lembur[$j]->status == 'Dibatalkan'){
                            $dataLembur[$idCabang_lembur]['total_pengajuan_dibatalkan'] = $lembur[$j]->jumlah; 
                        }
                    }
                }
                $dataLembur[$idCabang_lembur]['total_pengajuan'] =  $dataLembur[$idCabang_lembur]['total_pengajuan_diterima'] + 
                                                                    $dataLembur[$idCabang_lembur]['total_pengajuan_ditolak'] + 
                                                                    $dataLembur[$idCabang_lembur]['total_pengajuan_dibatalkan'];
            }

            for($i = 0; $i < $lembur_cabang->count(); $i++){

                $idCabang_lembur = $i+1;

                $insert_lembur = new Report;

                if($idCabang_lembur < 10){
                    $cabang_lembur = '0' . $idCabang_lembur;
                }

                if($month < 10){
                    $month_lembur = '0' . $month;
                }
                $insert_lembur->kode_report = 'R3' . $month_lembur . $year . $cabang_lembur;
                
                $insert_lembur->jenis_report = 'Lembur';
                $insert_lembur->bulan = $bulan;
                $insert_lembur->tahun = (string)$year;
                $insert_lembur->id_cabang = $idCabang_lembur;
                $insert_lembur->total_pengajuan = $dataLembur[$idCabang_lembur]['total_pengajuan'];
                $insert_lembur->total_pengajuan_diterima = $dataLembur[$idCabang_lembur]['total_pengajuan_diterima'];
                $insert_lembur->total_pengajuan_ditolak = $dataLembur[$idCabang_lembur]['total_pengajuan_ditolak'];
                $insert_lembur->total_pengajuan_dibatalkan = $dataLembur[$idCabang_lembur]['total_pengajuan_dibatalkan'];
                $insert_lembur->save();
                //echo $insert_izin->kode_report . 'total pengajuan diterima' . $insert_izin->total_pengajuan_diterima;
            }


            $claim = DB::table("data_klaim")
            ->join('employee' , 'data_klaim.id_employee' , '=' , 'employee.id')
            ->select('data_klaim.status' , 'employee.id_cabang', DB::raw('count(data_klaim.status) as jumlah'))
            ->whereBetween('data_klaim.tanggal_transaksi' , [$convert_date_awal, $convert_date_akhir])
            ->groupBy('data_klaim.status' , 'employee.id_cabang')
            ->get();

            $klaim_cabang = DB::table("data_klaim")
            ->join('employee' , 'data_klaim.id_employee' , '=' , 'employee.id')
            ->select('employee.id_cabang')
            ->distinct()
            ->orderBy('employee.id_cabang' , 'DESC')
            ->get();

            $dataKlaim = '';

            for($i = 0; $i < $klaim_cabang->count(); $i++){
                $idCabang_klaim = $i + 1;
                // echo 'id' . $idCabang;
                $dataKlaim[$idCabang_klaim] = array(
                    'total_pengajuan' => 0,
                    'total_pengajuan_diterima' => 0,
                    'total_pengajuan_ditolak' => 0,
                    'total_pengajuan_dibatalkan' => 0,
                );
                for($j = 0; $j < $claim->count(); $j++){
                    if($claim[$j]->id_cabang == $idCabang_klaim){
                        // echo '-' . $izin[$j]->id_cabang;
                        // $resultCabang->total_pengajuan
                        if($claim[$j]->status == 'Diterima'){
                            $dataKlaim[$idCabang_klaim]['total_pengajuan_diterima'] = $claim[$j]->jumlah; 
                            // echo 'id' . $idCabang . 'terima' . $izin[$j]->jumlah; 
                        }
                        else if($claim[$j]->status == 'Ditolak'){
                            $dataKlaim[$idCabang_klaim]['total_pengajuan_ditolak'] = $claim[$j]->jumlah; 
                        }
                        else if($claim[$j]->status == 'Dibatalkan'){
                            $dataKlaim[$idCabang_klaim]['total_pengajuan_dibatalkan'] = $claim[$j]->jumlah; 
                        }
                    }
                }
                $dataKlaim[$idCabang_klaim]['total_pengajuan'] = $dataKlaim[$idCabang_klaim]['total_pengajuan_diterima'] + 
                                                                 $dataKlaim[$idCabang_klaim]['total_pengajuan_ditolak'] + 
                                                                 $dataKlaim[$idCabang_klaim]['total_pengajuan_dibatalkan'];
            }

            for($i = 0; $i < $klaim_cabang->count(); $i++){

                $idCabang_klaim = $i+1;

                $insert_claim = new Report;

                if($idCabang_klaim < 10){
                    $cabang_klaim = '0' . $idCabang_klaim;
                }

                if($month < 10){
                    $month_klaim = '0' . $month;
                }
                $insert_claim->kode_report = 'R4' . $month_klaim . $year . $cabang_klaim;
                
                $insert_claim->jenis_report = 'Claim';
                $insert_claim->bulan = $bulan;
                $insert_claim->tahun = (string)$year;
                $insert_claim->id_cabang = $idCabang_klaim;
                $insert_claim->total_pengajuan = $dataKlaim[$idCabang_klaim]['total_pengajuan'];
                $insert_claim->total_pengajuan_diterima = $dataKlaim[$idCabang_klaim]['total_pengajuan_diterima'];
                $insert_claim->total_pengajuan_ditolak = $dataKlaim[$idCabang_klaim]['total_pengajuan_ditolak'];
                $insert_claim->total_pengajuan_dibatalkan = $dataKlaim[$idCabang_klaim]['total_pengajuan_dibatalkan'];
                $insert_claim->save();
                //echo $insert_izin->kode_report . 'total pengajuan diterima' . $insert_izin->total_pengajuan_diterima;
            }
            
            $insert_izin->save();
            $insert_cuti->save();
            $insert_lembur->save();
            $insert_claim->save();

            $report = DB::table("report")
            ->join('cabang' ,'cabang.id' , '=' , 'report.id_cabang')
            ->select('cabang.nama_cabang' , 'report.*')
            ->get();

           
       }

       $report = DB::table("report")
            ->join('cabang' ,'cabang.id' , '=' , 'report.id_cabang')
            ->select('cabang.nama_cabang' , 'report.*')
            ->get();

         

        // $report = DB::table("report")
        // ->join('cabang' ,'cabang.id' , '=' , 'report.id_cabang')
        // ->select('cabang.nama_cabang' , 'report.*')
        // ->get();

        //echo $report;

        return view('report' , ['employee' => $employee , 'report' => $report]);

    }

    public function downloadPdf(Request $request){

        
        $employee = Employee::where('id', Auth::user()->id_employee)->first();

        $target = $request->input('target');
        $target_cabang = $request->input('idCabang');

        // echo $target_cabang;

        $report_data = DB::table("report")
        ->join('cabang' ,'cabang.id' , '=' , 'report.id_cabang')
        ->select('cabang.nama_cabang' , 'report.*')
        ->where('report.id' , $target)
        ->first();

        //echo $report_data->kode_report;

        if($report_data ->bulan === 'Januari') {

            $bulan = 1;
        }
        else if($report_data ->bulan === 'Februari'){

            $bulan = 2;
        }
        else if($report_data ->bulan === 'Maret'){

            $bulan = 3;
        }
        else if($report_data ->bulan === 'April'){

            $bulan = 4;
        }
        else if($report_data ->bulan === 'Mei'){

            $bulan = 5;
        }
        else if($report_data ->bulan === 'Juni'){

            $bulan = 6;
        }
        else if($report_data ->bulan === 'Juli'){

            $bulan = 7;
        }
        else if($report_data ->bulan === 'Agustus'){

            $bulan = 8;
        }
        else if($report_data ->bulan === 'September'){

            $bulan = 9;
        }
        else if($report_data ->bulan === 'Oktober'){

            $bulan = 10;
        }
        else if($report_data ->bulan === 'November'){

            $bulan = 11;
        }
        else if($report_data ->bulan === 'Desember'){

            $bulan = 12;
        }


        $jenis_report = $report_data->jenis_report;
        $tahun = $report_data->tahun;

        if($bulan == 10 || $bulan == 11 || $bulan == 12){

            $tanggal = $tahun . '-' . $bulan . '-' . 01;
            $tanggal2 = $tahun . '-'  . $bulan . '-' . 31; 

        }
        else{

            $tanggal = $tahun . '-' . (int)0 . $bulan . '-' . 01;
            $tanggal2 = $tahun . '-' . (int)0 . $bulan . '-' . 31;

        }
        
        $tanggal_awal = date("Y-m-d" , strtotime($tanggal));
        $tanggal_akhir = date("Y-m-d" , strtotime($tanggal2));

        

        if($jenis_report === 'Izin'){

            $data_report = DB::table("attendance")
            ->join('employee' , 'attendance.id_employee' , '=' , 'employee.id')
            ->select('employee.nama' ,'attendance.alasan' , 'attendance.tanggal_permohonan' ,'attendance.jenis', 
                'attendance.alasan', 'attendance.waktu', 'attendance.id', 'employee.id_cabang')           
            ->whereBetween('attendance.tanggal_permohonan' , [$tanggal_awal , $tanggal_akhir])
            ->where('attendance.status' , 'Diterima')
            ->where('employee.id_cabang' , $target_cabang)
            ->get(); 

            //echo $target_cabang;

        }

        else if($jenis_report === 'Cuti'){

            $data_report = DB::table("cuti")
            ->join('employee' , 'cuti.id_employee' , '=' , 'employee.id')
            ->join('jenis_cuti' , 'cuti.id_jenis' , '=' , 'jenis_cuti.id')
            ->select('employee.nama' , 'jenis_cuti.nama_jenis' , 'cuti.tanggal_mulai' , 'cuti.tanggal_selesai' ,
                    'cuti.alasan' , 'cuti.pegawai_pengganti','employee.id_cabang')
            ->whereBetween('cuti.tanggal_mulai' , [$tanggal_awal , $tanggal_akhir])
            ->whereBetween('cuti.tanggal_selesai' , [$tanggal_awal , $tanggal_akhir])
            ->where('cuti.status' , 'Diterima')
            ->where('employee.id_cabang' , $target_cabang)
            ->get();
        }

        else if($jenis_report === 'Lembur'){

            $data_report = DB::table("overtime")
            ->join('employee' , 'overtime.id_employee', '=' , 'employee.id')
            ->select('employee.nama' , 'overtime.*' , 'employee.id_cabang')
            ->whereBetween('overtime.tanggal' , [$tanggal_awal,$tanggal_akhir])
            ->where('overtime.status' , 'Diterima')
            ->where('employee.id_cabang' , $target_cabang)
            ->get();
        }
        else{

            $data_report = DB::table("data_klaim")
            ->join('employee', 'data_klaim.id_employee' , '=', 'employee.id')
            ->join('peraturan_klaim', 'data_klaim.id_klaim' , '=' , 'peraturan_klaim.id')
            ->select('employee.nama' , 'peraturan_klaim.jenis' , 'data_klaim.*' , 'employee.id_cabang')
            ->whereBetween('data_klaim.tanggal_transaksi' , [$tanggal_awal, $tanggal_akhir])
            ->where('data_klaim.status', 'Diterima')
            ->where('employee.id_cabang' , $target_cabang)
            ->get();
        }


        if($request->has('download')){
            $pdf = PDF::loadView('reportPdf', ['report_data' => $report_data, 'data_report' => $data_report]);
            return $pdf->download('reportPdf.pdf');
        }


        return redirect('/report/download');
    }

    public function detailReport(Request $request){

        $employee = Employee::where('id', Auth::user()->id_employee)->first();
        $report_id = $request->input('target');
        $report_data = DB::table("report")
        ->join('cabang','cabang.id','=','report.id_cabang')->where('report.id', $report_id)->first();
 

        return view('reportDetails',['employee' => $employee , 'report_data' => $report_data]);

    }

    public function detailView(Request $request) {
        $employee = Employee::where('id', Auth::user()->id_employee)->first();

        $target = $request->input('target');
        $target_cabang = $request->input('idCabang');

        // echo $target_cabang;

        $report_data = DB::table("report")
        ->join('cabang' ,'cabang.id' , '=' , 'report.id_cabang')
        ->select('cabang.nama_cabang' , 'report.*')
        ->where('report.id' , $target)
        ->first();

        //echo $report_data->kode_report;

        if($report_data ->bulan === 'Januari') {

            $bulan = 1;
        }
        else if($report_data ->bulan === 'Februari'){

            $bulan = 2;
        }
        else if($report_data ->bulan === 'Maret'){

            $bulan = 3;
        }
        else if($report_data ->bulan === 'April'){

            $bulan = 4;
        }
        else if($report_data ->bulan === 'Mei'){

            $bulan = 5;
        }
        else if($report_data ->bulan === 'Juni'){

            $bulan = 6;
        }
        else if($report_data ->bulan === 'Juli'){

            $bulan = 7;
        }
        else if($report_data ->bulan === 'Agustus'){

            $bulan = 8;
        }
        else if($report_data ->bulan === 'September'){

            $bulan = 9;
        }
        else if($report_data ->bulan === 'Oktober'){

            $bulan = 10;
        }
        else if($report_data ->bulan === 'November'){

            $bulan = 11;
        }
        else if($report_data ->bulan === 'Desember'){

            $bulan = 12;
        }


        $jenis_report = $report_data->jenis_report;
        $tahun = $report_data->tahun;

        if($bulan == 10 || $bulan == 11 || $bulan == 12){

            $tanggal = $tahun . '-' . $bulan . '-' . 01;
            $tanggal2 = $tahun . '-'  . $bulan . '-' . 31; 

        }
        else{

            $tanggal = $tahun . '-' . (int)0 . $bulan . '-' . 01;
            $tanggal2 = $tahun . '-' . (int)0 . $bulan . '-' . 31;

        }
        
        $tanggal_awal = date("Y-m-d" , strtotime($tanggal));
        $tanggal_akhir = date("Y-m-d" , strtotime($tanggal2));

        

        if($jenis_report === 'Izin'){

            $data_report = DB::table("attendance")
            ->join('employee' , 'attendance.id_employee' , '=' , 'employee.id')
            ->select('employee.nama' ,'attendance.alasan' , 'attendance.tanggal_permohonan' ,'attendance.jenis', 
                'attendance.alasan', 'attendance.waktu', 'attendance.id', 'employee.id_cabang')           
            ->whereBetween('attendance.tanggal_permohonan' , [$tanggal_awal , $tanggal_akhir])
            ->where('attendance.status' , 'Diterima')
            ->where('employee.id_cabang' , $target_cabang)
            ->get(); 

            //echo $data_report;

        }

        else if($jenis_report === 'Cuti'){

            $data_report = DB::table("cuti")
            ->join('employee' , 'cuti.id_employee' , '=' , 'employee.id')
            ->join('jenis_cuti' , 'cuti.id_jenis' , '=' , 'jenis_cuti.id')
            ->select('employee.nama' , 'jenis_cuti.nama_jenis' , 'cuti.tanggal_mulai' , 'cuti.tanggal_selesai' ,
                    'cuti.alasan' , 'cuti.pegawai_pengganti','employee.id_cabang')
            ->whereBetween('cuti.tanggal_mulai' , [$tanggal_awal , $tanggal_akhir])
            ->whereBetween('cuti.tanggal_selesai' , [$tanggal_awal , $tanggal_akhir])
            ->where('cuti.status' , 'Diterima')
            ->where('employee.id_cabang' , $target_cabang)
            ->get();
            //echo $data_report;
        }

        else if($jenis_report === 'Lembur'){

            $data_report = DB::table("overtime")
            ->join('employee' , 'overtime.id_employee', '=' , 'employee.id')
            ->select('employee.nama' , 'overtime.*' , 'employee.id_cabang')
            ->whereBetween('overtime.tanggal' , [$tanggal_awal,$tanggal_akhir])
            ->where('overtime.status' , 'Diterima')
            ->where('employee.id_cabang' , $target_cabang)
            ->get();
            //echo $data_report;
        }
        else{

            $data_report = DB::table("data_klaim")
            ->join('employee', 'data_klaim.id_employee' , '=', 'employee.id')
            ->join('peraturan_klaim', 'data_klaim.id_klaim' , '=' , 'peraturan_klaim.id')
            ->select('employee.nama' , 'peraturan_klaim.jenis' , 'data_klaim.*' , 'employee.id_cabang')
            ->whereBetween('data_klaim.tanggal_transaksi' , [$tanggal_awal, $tanggal_akhir])
            ->where('data_klaim.status', 'Diterima')
            ->where('employee.id_cabang' , $target_cabang)
            ->get();
            //echo $data_report;
        }

            return view('reportDetails',['employee' => $employee , 'report_data' => $report_data, 'data_report' => $data_report]);
/*
        return redirect('/report/details');
*/    }
}