<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Employee;
use App\Cuti;
use App\JenisCuti;
use App\Departemen;
use App\Cabang;
use App\JatahCuti;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{

  public function dataCuti(){

    $employee = Employee::where('id', Auth::user()->id_employee)->first();
    $id_employee = Auth::user()->id_employee;

    $jatahCuti = DB::table('jatah_cuti')
    ->join('jenis_cuti' , 'jenis_cuti.id' , '=' , 'jatah_cuti.id_jenis')
    ->select('jatah_cuti.*' , 'jenis_cuti.*')
    ->where('id_employee' , $id_employee)
    ->where('jatah_cuti.is_berlaku' , 1)
    ->where('jenis_cuti.is_berlaku' , 1)
    ->get();

    $result = DB::table('cuti')
    ->join('jenis_cuti' , 'jenis_cuti.id' , '=' , 'cuti.id_jenis')
    ->select('cuti.*', 'jenis_cuti.nama_jenis')
    ->where('id_employee' , $id_employee)
    ->get();

    $jenisCuti = DB::table('jenis_cuti')->get();

    $today = date("Y-m-d");
      // $jatahCuti = JatahCuti::with('jenis_cuti')->get();

      return view('formLeave' , ['jatahCuti' => $jatahCuti, 'result' => $result, 'jenisCuti' => $jenisCuti, 'employee' => $employee, 'today' => $today]);
  }

  public function riwayatCuti(){
    $employee = Employee::where('id', Auth::user()->id_employee)->first();
    $id_employee = Auth::user()->id_employee;

        $result = DB::table('cuti')
        ->join('jenis_cuti' , 'jenis_cuti.id' , '=' , 'cuti.id_jenis')
        ->select('cuti.*', 'jenis_cuti.nama_jenis')
        ->where('id_employee' , $id_employee)
        ->get();

        return view('formLeave' , ['result' => $result, 'employee' => $employee]);
    }

    public function riwayatCutiApproval(){
          $result = DB::table('cuti')
          ->join('jenis_cuti' , 'jenis_cuti.id' , '=' , 'cuti.id_jenis')
          ->select('cuti.*', 'jenis_cuti.nama_jenis')
          ->get();

          return view('FormApprovalLeave' , ['result' => $result]);
      }

    public function submitForm(Request $request){


        $id_employee = Auth::user()->id_employee;

        $jenis = $request->input('jenisCuti');
        $jenis = DB::table('jenis_cuti')
        ->select('id')
        ->where('nama_jenis' , $jenis)
        ->first();

        // $jenis = substr($jenis, strpos($jenis, '":"') + 3, 1);

        //ubah format tanggal
        $tanggal = $request->input('tanggalMulai');
        $split_tanggal = explode("-", $tanggal);
        $tahun = $split_tanggal[0];
        $bulan = $split_tanggal[1]; 
        $hari = $split_tanggal[2];
        $tanggalMulai = $tahun. '-' . $bulan .'-' . $hari;

        //ubah format tanggal
        $tanggal = $request->input('tanggalSelesai');
        $split_tanggal = explode("-", $tanggal);
        $tahun = $split_tanggal[0];
        $bulan = $split_tanggal[1]; 
        $hari = $split_tanggal[2];
        $tanggalSelesai = $tahun. '-' . $bulan .'-' . $hari;


        $alasan = $request->input('alasan');
        $alamat = $request->input('alamat');
        $telp = $request->input('telp');

        $pegawaiPengganti = $request->input('pegawaipengganti');

        $status = 'Menunggu Persetujuan HoD';
        /*
        $data = array('id_employee'=>$id_employee, 'jenis'=>$jenis, 'tanggal_permohonan'=>$tanggal_permohonan, 'waktu'=>$jam, 'alasan'=>$alasan, 'status'=>$status);
        DB::table('attendance')->insert($data);
        */

        $cuti = new Cuti;
        $cuti->id_employee = $id_employee;
        $cuti->id_jenis = $jenis->id;
        $cuti->tanggal_mulai = $tanggalMulai;
        $cuti->tanggal_selesai = $tanggalSelesai;
        $cuti->alasan = $alasan;
        $cuti->alamat = $alamat;
        $cuti->no_telepon = $telp;

        $cuti->pegawai_pengganti = $pegawaiPengganti;

        $cuti->status = $status;

        $cuti->save();

        return redirect('/leave/form')->with('alert','Permohonan Cuti Telah Dikirim');

    }

 public function approval(){
      $employee = Employee::where('id', Auth::user()->id_employee)->first();

      $role = Auth:: user()->role;

      $approvals = '';
      if($role === 'headOfDepartment') {
        $approvals = DB::table('cuti')
        ->join('employee' , 'cuti.id_employee' , '=' , 'employee.id')

        ->join('departemen' , 'departemen.id' , '=' , 'employee.id_departemen')
        ->join('cabang' , 'cabang.id' , '=' , 'employee.id_cabang')

        ->join('jenis_cuti' , 'jenis_cuti.id' , '=' , 'cuti.id_jenis')
        ->select('cuti.*' , 'employee.nama' , 'employee.nik_employee' , 'departemen.nama_departemen' , 'cabang.nama_cabang' , 'jenis_cuti.nama_jenis')
        ->where('cuti.status' , 'Menunggu Persetujuan HoD')
        ->get();
      }
      elseif ($role === 'hrManager') {
        $approvals = DB::table('cuti')
        ->join('employee' , 'cuti.id_employee' , '=' , 'employee.id')

        ->join('departemen' , 'departemen.id' , '=' , 'employee.id_departemen')
        ->join('cabang' , 'cabang.id' , '=' , 'employee.id_cabang')

        ->join('jenis_cuti' , 'jenis_cuti.id' , '=' , 'cuti.id_jenis')
        ->select('cuti.*' , 'employee.nama' , 'employee.nik_employee' , 'departemen.nama_departemen' , 'cabang.nama_cabang' , 'jenis_cuti.nama_jenis')
        ->where('cuti.status' , 'Menunggu Persetujuan HRM')
        ->get();
      }

      $result = DB::table('cuti')
      ->join('employee' , 'cuti.id_employee' , '=' , 'employee.id')

      ->join('departemen' , 'departemen.id' , '=' , 'employee.id_departemen')
      ->join('cabang' , 'cabang.id' , '=' , 'employee.id_cabang')

      ->join('jenis_cuti' , 'jenis_cuti.id' , '=' , 'cuti.id_jenis')
      ->select('cuti.*' , 'employee.nama' , 'employee.nik_employee' , 'departemen.nama_departemen' , 'cabang.nama_cabang' , 'jenis_cuti.nama_jenis')
      ->get();
     // $approvals = Cuti::with('employee', 'departemen', 'cabang', 'jenis_cuti')->get();
     // echo $approval;
     return view('FormApprovalLeave' , ['approvals' => $approvals, 'employee' => $employee, 'result' => $result]);
 }

 public function approvalDiterima(Request $request){
         $role = Auth:: user()->role;

      $approvals = '';
      if($role === 'headOfDepartment') {
        $approvals = DB::table('cuti')
        ->join('employee' , 'cuti.id_employee' , '=' , 'employee.nik_employee')

        ->join('departemen' , 'departemen.id_departemen' , '=' , 'employee.id_departemen')
        ->join('cabang' , 'cabang.id_cabang' , '=' , 'employee.id_cabang')

        ->join('jenis_cuti' , 'jenis_cuti.id' , '=' , 'cuti.id_jenis')
        ->select('cuti.*' , 'employee.nama' , 'employee.nik_employee' , 'departemen.nama_departemen' , 'cabang.nama_cabang' , 'jenis_cuti.nama_jenis')
        ->where('cuti.status' , 'Menunggu Persetujuan HoD')
        ->get();
      }
      elseif ($role === 'hrManager') {
        $approvals = DB::table('cuti')
        ->join('employee' , 'cuti.id_employee' , '=' , 'employee.nik_employee')

        ->join('departemen' , 'departemen.id_departemen' , '=' , 'employee.id_departemen')
        ->join('cabang' , 'cabang.id_cabang' , '=' , 'employee.id_cabang')

        ->join('jenis_cuti' , 'jenis_cuti.id' , '=' , 'cuti.id_jenis')
        ->select('cuti.*' , 'employee.nama' , 'employee.nik_employee' , 'departemen.nama_departemen' , 'cabang.nama_cabang' , 'jenis_cuti.nama_jenis')
        ->where('cuti.status' , 'Menunggu Persetujuan HRM')
        ->get();
      }

        $role = Auth:: user()->role;

        $target = $request -> input('target');


        $cuti = Cuti::where('id' , $target) -> first();

        if($role === 'headOfDepartment') {


          $cuti->status = 'Menunggu Persetujuan HRM';
        }
        elseif ($role === 'hrManager') {
          $cuti->status = 'Diterima';

          $fdate = DB::table('cuti')
          ->select('tanggal_mulai')
          ->where('id' , $target)
          ->first();

          $tdate = DB::table('cuti')
          ->select('tanggal_selesai')
          ->where('id' , $target)
          ->first();

          $fdate1 = $fdate->tanggal_mulai;
          $tdate1 = $tdate->tanggal_selesai;

          $start = Carbon::parse($fdate1);
          $end =  Carbon::parse($tdate1);
          $dif = $end->diffInDays($start);

          $jatahCuti = JatahCuti::where('id_employee' , $cuti->id_employee)->where('id_jenis' , $cuti->id_jenis) -> first();
          $angka1 = $jatahCuti->sisa_cuti;
          $angka2 = $dif;
          
          $jatahCuti->sisa_cuti = $angka1 - $angka2;
          $jatahCuti -> save();
        }

        $cuti -> save();

        // $email = $cuti -> employee -> email;
        $employee = Employee::where('id', $cuti->id_employee)->first();

        // echo $employee ->nama;

        // Mail::to($email)->send(new NotifikasiDiterima());




        return redirect('/leave/approval')->with('alert','Permohonan cuti ' .$employee->nama . ' ' .'Disetujui');


    }

     public function approvalDitolak(Request $request){
         $role = Auth:: user()->role;

      $approvals = '';
      if($role === 'headOfDepartment') {
        $approvals = DB::table('cuti')
        ->join('employee' , 'cuti.id_employee' , '=' , 'employee.nik_employee')

        ->join('departemen' , 'departemen.id_departemen' , '=' , 'employee.id_departemen')
        ->join('cabang' , 'cabang.id_cabang' , '=' , 'employee.id_cabang')

        ->join('jenis_cuti' , 'jenis_cuti.id' , '=' , 'cuti.id_jenis')
        ->select('cuti.*' , 'employee.nama' , 'employee.nik_employee' , 'departemen.nama_departemen' , 'cabang.nama_cabang' , 'jenis_cuti.nama_jenis')
        ->where('cuti.status' , 'Menunggu Persetujuan HoD')
        ->get();
      }
      elseif ($role === 'hrManager') {
        $approvals = DB::table('cuti')
        ->join('employee' , 'cuti.id_employee' , '=' , 'employee.nik_employee')

        ->join('departemen' , 'departemen.id_departemen' , '=' , 'employee.id_departemen')
        ->join('cabang' , 'cabang.id_cabang' , '=' , 'employee.id_cabang')

        ->join('jenis_cuti' , 'jenis_cuti.id' , '=' , 'cuti.id_jenis')
        ->select('cuti.*' , 'employee.nama' , 'employee.nik_employee' , 'departemen.nama_departemen' , 'cabang.nama_cabang' , 'jenis_cuti.nama_jenis')
        ->where('cuti.status' , 'Menunggu Persetujuan HRM')
        ->get();
      }

       $target = $request -> input('target');

       $cuti = Cuti::where('id' , $target) -> first();


       $cuti->status = 'Ditolak';

       $cuti -> save();

       // $email = $cuti -> employee -> email;

       $employee = Employee::where('id', $cuti->id_employee)->first();

       // Mail::to($email)->send(new NotifikasiDiterima());



        return redirect('/leave/approval')->with('alert','Permintaan ' .$employee->nama . ' ' .'Ditolak');

    }

    public function dibatalkan(Request $request){


        $target = $request->input('target');


        $result = Cuti::where('id', $target) -> first();


        $result -> status = 'Dibatalkan';

        $result -> save();

        return redirect('/leave/form')->with('alert','Permohonan Cuti Anda Dibatalkan');

    }

}
