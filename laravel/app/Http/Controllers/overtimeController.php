<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Overtime;
use App\Employee;
use Illuminate\Support\Facades\Auth;
use Mail;
use Log;
use App\Mail\NotifikasiDiterima;
use App\Mail\NotifikasiDitolak;

class overtimeController extends Controller
{


    public function submitForm(Request $request)
    {

        $id_employee = Auth::user()->id_employee;

    /*
    ubah format tanggal / >> -
    */
     $tanggal =$request->input('tanggalLembur');
     $split_tanggal = explode("/", $tanggal);
     $tahun = $split_tanggal[2];
     $bulan = $split_tanggal[1];
     $hari = $split_tanggal[0];
     $tanggal_permohonan = $tahun. '-' . $hari .'-' . $bulan;
     $waktuMulai = $request->input('jamMulai');
     $split_waktuMulai = explode(" ", $waktuMulai);
     $jamMulai = $split_waktuMulai[0] . ':' . '00';

     $waktuSelesai = $request->input('jamSelesai');
     $split_waktuSelesai = explode(" ", $waktuSelesai);
     $jamSelesai = $split_waktuSelesai[0] . ':' . '00';

     $tujuan = $request->input('alasan');
     $status = 'Menunggu Persetujuan HoD';
     $overtime = new Overtime;
     $overtime->id_employee = $id_employee;
     $overtime->tanggal = $tanggal_permohonan;
     $overtime->waktu_mulai = $jamMulai;
     $overtime->waktu_selesai = $jamSelesai;
     $overtime->alasan = $tujuan;
     $overtime->status = $status;


     //echo $overtime;
     $overtime->save();

      return redirect('/overtime/form')->with('alert','Permintaan Anda Telah Dikirimkan');
    }

    public function riwayatLembur(){

        //Nampilin riwayat lembur overtime
        $employee = Employee::where('id', Auth::user()->id_employee)->first();
        $id_employee = Auth::user()->id_employee; //ambil nik employee yg login
        $result = DB::table('overtime')->select('tanggal' ,'waktu_mulai' , 'waktu_selesai' , 'status' ,'id')
                                        ->where('id_employee' , $id_employee)
                                        ->get();

        //nampilin view lembur di blade
        return view('formLembur' , ['result' => $result, 'employee' => $employee]);


    }
    //nampilin tabel approval
    public function approvalLembur ()
    {
        $employee = Employee::where('id', Auth::user()->id_employee)->first();
        // $approvalLembur = Overtime::with('employee')->get();
        // $id_employee = Auth::user()->id_employee;
        $result = DB::table('overtime') ->join('employee' , 'overtime.id_employee' , '=' , 'employee.id')
                                        ->select('overtime.tanggal' ,'overtime.waktu_mulai' , 'overtime.waktu_selesai' , 'overtime.status' ,'overtime.id', 'overtime.alasan', 'employee.nama')
                                        ->get();

        if(Auth::user()->role === 'headOfDepartment'){

        }

        elseif (Auth::user()->role === 'hrManager') {
            # code...
        }

        // echo $result;
        //echo $approvalLembur;
        return view('FormApprovalLembur' , ['approvalLembur' => $result, 'employee' => $employee]);
    }

     public function approved(Request $request){
        $target = $request->input('target');

        //echo $target;


        $overtime = Overtime::where('id' , $target)->first(); //satu baris

        $overtime->status = 'Menunggu Persetujuan HRM';

        $employee = Employee::where('id', $overtime->id_employee)->first();

        $overtime->save();


        // $email = $overtime -> employee -> email;

        // Mail::to($email)->send(new NotifikasiDiterima());

        // $nama = $overtime->employee->nama;


        return redirect('/overtime/approval')->with('alert','Permintaan ' .$employee->nama . ' ' .'Disetujui');

    }

     public function reject(Request $request){
        $target = $request->input('target');


        $overtime = Overtime::where('id', $target)->first();

        $overtime->status = 'Ditolak';


        $employee = Employee::where('id', $overtime->id_employee)->first();

        $overtime->save();

        // $email = $overtime -> employee -> email;

        // Mail::to($email)->send(new NotifikasiDitolak());

        // $nama = $overtime->employee->nama;


        return redirect('/overtime/approval')->with('alert','Permintaan ' .$employee->nama . ' ' .'Ditolak');


    }

    public function batal(Request $request){
        $target = $request->input('target');

        $result = Overtime::where('id', $target)->first();

        $result->status = 'Dibatalkan';

        $result->save();

        // $email = $attendance -> employee -> email;

        // Mail::to($email)->send(new NotifikasiDitolak());

        // $nama = $attendance->employee->nama;

        return redirect('/overtime/form')->with('alert','Permintaan Anda Dibatalkan');
    }

    // public function batal(Request $request){
    //     $target = $request->input('target');
        //
    //     $result = Overtime::where('id', $target)->first();
        //
    //     $result->status = 'Dibatalkan';
        //
    //     $result->save();
        //
    //     return redirect('/overtime/form')->with('alert','Permintaan Anda Dibatalkan');
    // }

}
