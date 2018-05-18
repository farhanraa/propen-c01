<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Attendance;
use App\Employee;
use Mail;
use Log;
use App\Mail\NotifikasiDiterima;
use App\Mail\NotifikasiDitolak;
use Illuminate\Support\Facades\Auth;



class izinController extends Controller
{

     public function submitForm(Request $request){
    /*
    */
        $id_employee = Auth::user()->id_employee;
        $jenis = $request->input('jenisIzin');


        //ubah format tanggal
        $tanggal =$request->input('tanggal');
        $split_tanggal = explode("-", $tanggal);
        // echo $tanggal;
        $tahun = $split_tanggal[0];
        $bulan = $split_tanggal[1]; 
        $hari = $split_tanggal[2];
        
        $tanggal_permohonan = $tahun. '-' . $bulan .'-' . $hari;
        //ubah format waktu
        $waktu = $request->input('waktu');
        $split_waktu = explode(" ", $waktu);
        $jam = $split_waktu[0];
        //biar bisa formatnya 24 jam
        if($split_waktu[1] === 'PM'){
            $split_jam = explode(":", $jam);
            $jam2 = (int)$split_jam[0] + 12;
            if((int)$split_jam[0] === 12){
                $jam2 = 12;
            }
            $jam = $jam2 . ":" . $split_jam[1];

        }

        $alasan = $request->input('alasan');
        $status = 'Menunggu Persetujuan HoD';
        /*
        $data = array('id_employee'=>$id_employee, 'jenis'=>$jenis, 'tanggal_permohonan'=>$tanggal_permohonan, 'waktu'=>$jam, 'alasan'=>$alasan, 'status'=>$status);
        DB::table('attendance')->insert($data);
        */

        $attendance = new Attendance;
        $attendance->id_employee = $id_employee;
        $attendance->jenis = $jenis;
        $attendance->tanggal_permohonan = $tanggal_permohonan;
        $kodePengajuan = DB::table('attendance')->count() + 1;
        if($kodePengajuan < 10){
            $kodePengajuan = '00' . $kodePengajuan;
        }else if($kodePengajuan < 100){
            $kodePengajuan = '0' . $kodePengajuan;
         }
        $attendance->kode_pengajuan = 'KDI' . $kodePengajuan;
        $attendance->waktu = $jam;
        $attendance->alasan = $alasan;
        $attendance->status = $status;

        $attendance->save();

        return redirect('/permission/form')->with('alert','Permintaan Anda Telah Dikirimkan');

    }

    public function riwayatIzin(){

        $employee = Employee::where('id', Auth::user()->id_employee)->first();
        $id_employee = Auth::user()->id_employee;

        $result = DB::table('attendance')->select('jenis' ,'tanggal_permohonan' , 'alasan' , 'status' , 'id')
                                         ->where('id_employee' , $id_employee)
                                         ->get();

        //$result = Attendance::all();
        //echo $result;
        $today = date("Y-m-d");
        return view('formIzin' , ['result' => $result, 'employee' => $employee , 'today' => $today]);

    }

    public function approval(){
        $employee = Employee::where('id', Auth::user()->id_employee)->first();
        $riwayatPengajuan = DB::table('attendance')
        ->join('employee' , 'attendance.id_employee' , '=' , 'employee.id')
        ->select('employee.nama' ,'attendance.alasan' , 'attendance.tanggal_permohonan' ,'attendance.jenis', 'attendance.alasan', 'attendance.waktu', 'attendance.status', 'attendance.id')
        ->get();

        // if(Auth::user()->role === 'HRM'){
        //     $approval = Attendance::where('status', 'menunggu HRM')->with('employee')->get();
        // }

        if(Auth::user()->role === 'headOfDepartment'){

            $listPengajuan = DB::table('attendance')
            ->join('employee' , 'attendance.id_employee' , '=' , 'employee.id')

            ->select('employee.nama' ,'attendance.alasan' , 'attendance.tanggal_permohonan' ,'attendance.jenis', 'attendance.alasan', 'attendance.waktu', 'attendance.status', 'attendance.id')
            ->where('attendance.status' , 'Menunggu Persetujuan HoD')
            ->get();
        }

        else if(Auth::user()->role === 'hrManager'){
            
            $listPengajuan = DB::table('attendance')
            ->join('employee' , 'attendance.id_employee' , '=' , 'employee.id')
            ->select('employee.nama' ,'attendance.alasan' , 'attendance.tanggal_permohonan' ,'attendance.jenis', 'attendance.alasan', 'attendance.waktu', 'attendance.status', 'attendance.id')
            ->where('attendance.status' , 'Menunggu Persetujuan HRM')
            ->get();
        }

        return view('tableApprovalIzin' , ['listPengajuan' => $listPengajuan, 'employee' => $employee , 'riwayatPengajuan' => $riwayatPengajuan]);
    }


    public function approvalDiterima(Request $request){

        $target = $request->input('target');



        $attendance = Attendance::where('id' , $target)->first();

        if(Auth::user()->role === 'headOfDepartment'){
            $attendance->status = 'Menunggu Persetujuan HRM';
            $attendance->save();
        }
        else if(Auth::user()->role === 'hrManager'){
            $attendance->status = 'Diterima';

            $attendance->save();
        }


        // $email = $attendance -> employee -> email;

        //$nama = $attendance->employee->nama;
        $employee = Employee::where('id', $attendance->id_employee)->first();
        // echo $employee;

        // Mail::to($email)->send(new NotifikasiDiterima());

        return redirect('/permission/approval')->with('alert','Permintaan ' .$employee->nama . ' ' .'Disetujui');

    }

     public function approvalDitolak(Request $request){
        $target = $request->input('target');

        $attendance = Attendance::where('id', $target)->first();

        $attendance->status = 'Ditolak';

        $attendance->save();

        // $email = $attendance -> employee -> email;

        // Mail::to($email)->send(new NotifikasiDitolak());

        // $nama = $attendance->employee->nama;
        $employee = Employee::where('id', $attendance->id_employee)->first();


        return redirect('/permission/approval')->with('alert','Permintaan ' .$employee->nama . ' ' .'Ditolak');

    }

    public function dibatalkan(Request $request){

       // echo "masuk";
        $target = $request->input('target');

        $result = Attendance::where('id', $target)->first();

        $result->status = 'Dibatalkan';

        $result->save();

        return redirect('/permission/form')->with('alert','Permintaan Anda Dibatalkan');

    }

}
