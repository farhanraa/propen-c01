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
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{

  public function dataCuti(){
    
    $employee = Employee::where('nik_employee', Auth::user()->nik_employee)->first();
    
    $nik_employee = Auth::user()->nik_employee;

    $jatahCuti = DB::table('jatah_cuti')
    ->join('jenis_cuti' , 'jenis_cuti.id_jenis' , '=' , 'jatah_cuti.id_jenis')
    ->select('jatah_cuti.*' , 'jenis_cuti.*')
    ->where('nik_employee' , $nik_employee)
    ->where('jatah_cuti.is_berlaku' , 1)
    ->where('jenis_cuti.is_berlaku' , 1)
    ->get();

    $result = DB::table('cuti')
    ->join('jenis_cuti' , 'jenis_cuti.id_jenis' , '=' , 'cuti.id_jenis')
    ->select('cuti.*', 'jenis_cuti.nama_jenis')
    ->where('nik_employee' , $nik_employee)
    ->get();

    $jenisCuti = DB::table('jenis_cuti')->get();

      // $jatahCuti = JatahCuti::with('jenis_cuti')->get();

      return view('formLeave' , ['jatahCuti' => $jatahCuti, 'result' => $result, 'jenisCuti' => $jenisCuti, 'employee' => $employee]);
  }

  public function riwayatCuti(){
     $employee = Employee::where('nik_employee', Auth::user()->nik_employee)->first();

        $nik_employee = Auth::user()->nik_employee;

        $result = DB::table('cuti')
        ->join('jenis_cuti' , 'jenis_cuti.id_jenis' , '=' , 'cuti.id_jenis')
        ->select('cuti.*', 'jenis_cuti.nama_jenis')
        ->where('nik_employee' , $nik_employee)
        ->get();

        return view('formLeave' , ['result' => $result, 'employee' => $employee]);
    }

    public function submitForm(Request $request){

        $nik_employee = Auth::user()->nik_employee;

        $jenis = $request->input('jenisCuti');
        $jenis = DB::table('jenis_cuti')
        ->select('id_jenis')
        ->where('nama_jenis' , $jenis)
        ->get();

        $jenis = substr($jenis, strpos($jenis, '":"') + 3, 12);

        //ubah format tanggal
        $tanggal = $request->input('tanggalMulai');
        $split_tanggal = explode("/", $tanggal);
        $tahun = $split_tanggal[2];
        $bulan = $split_tanggal[1];
        $hari = $split_tanggal[0];
        $tanggalMulai = $tahun. '-' . $hari .'-' . $bulan;

        //ubah format tanggal
        $tanggal = $request->input('tanggalSelesai');
        $split_tanggal = explode("/", $tanggal);
        $tahun = $split_tanggal[2];
        $bulan = $split_tanggal[1];
        $hari = $split_tanggal[0];
        $tanggalSelesai = $tahun. '-' . $hari .'-' . $bulan;

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
        $cuti->nik_employee = $nik_employee;
        $cuti->id_jenis = $jenis;
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
      $employee = Employee::where('nik_employee', Auth::user()->nik_employee)->first();
      $role = Auth:: user()->role;

      $approvals = '';
      if($role === 'headOfDepartment') {
        $approvals = DB::table('cuti')
        ->join('employee' , 'cuti.nik_employee' , '=' , 'employee.nik_employee')

        ->join('departemen' , 'departemen.id_departemen' , '=' , 'employee.id_departemen')
        ->join('cabang' , 'cabang.id_cabang' , '=' , 'employee.id_cabang')

        ->join('jenis_cuti' , 'jenis_cuti.id_jenis' , '=' , 'cuti.id_jenis')
        ->select('cuti.*' , 'employee.nama' , 'employee.nik_employee' , 'departemen.nama_departemen' , 'cabang.nama_cabang' , 'jenis_cuti.nama_jenis')
        ->where('cuti.status' , 'Menunggu Persetujuan HoD')
        ->get();
      }
      elseif ($role === 'hrManager') {
        $approvals = DB::table('cuti')
        ->join('employee' , 'cuti.nik_employee' , '=' , 'employee.nik_employee')

        ->join('departemen' , 'departemen.id_departemen' , '=' , 'employee.id_departemen')
        ->join('cabang' , 'cabang.id_cabang' , '=' , 'employee.id_cabang')

        ->join('jenis_cuti' , 'jenis_cuti.id_jenis' , '=' , 'cuti.id_jenis')
        ->select('cuti.*' , 'employee.nama' , 'employee.nik_employee' , 'departemen.nama_departemen' , 'cabang.nama_cabang' , 'jenis_cuti.nama_jenis')
        ->where('cuti.status' , 'Menunggu Persetujuan HRM')
        ->get();
      }

     // $approvals = Cuti::with('employee', 'departemen', 'cabang', 'jenis_cuti')->get();
     // echo $approval;
     return view('FormApprovalLeave' , ['approvals' => $approvals, 'employee' => $employee]);
 }

 public function approvalDiterima(Request $request){
         $role = Auth:: user()->role;

      $approvals = '';
      if($role === 'headOfDepartment') {
        $approvals = DB::table('cuti')
        ->join('employee' , 'cuti.nik_employee' , '=' , 'employee.nik_employee')

        ->join('departemen' , 'departemen.id_departemen' , '=' , 'employee.id_departemen')
        ->join('cabang' , 'cabang.id_cabang' , '=' , 'employee.id_cabang')

        ->join('jenis_cuti' , 'jenis_cuti.id_jenis' , '=' , 'cuti.id_jenis')
        ->select('cuti.*' , 'employee.nama' , 'employee.nik_employee' , 'departemen.nama_departemen' , 'cabang.nama_cabang' , 'jenis_cuti.nama_jenis')
        ->where('cuti.status' , 'Menunggu Persetujuan HoD')
        ->get();
      }
      elseif ($role === 'hrManager') {
        $approvals = DB::table('cuti')
        ->join('employee' , 'cuti.nik_employee' , '=' , 'employee.nik_employee')

        ->join('departemen' , 'departemen.id_departemen' , '=' , 'employee.id_departemen')
        ->join('cabang' , 'cabang.id_cabang' , '=' , 'employee.id_cabang')

        ->join('jenis_cuti' , 'jenis_cuti.id_jenis' , '=' , 'cuti.id_jenis')
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
        }

        $cuti -> save();

        // $email = $cuti -> employee -> email;
        $employee = Employee::where('nik_employee', $cuti->nik_employee)->first(); 

        // echo $employee ->nama;

        // Mail::to($email)->send(new NotifikasiDiterima());




        return redirect('/leave/approval')->with('alert','Permohonan cuti ' .$employee->nama . ' ' .'Disetujui');


    }

     public function approvalDitolak(Request $request){
         $role = Auth:: user()->role;

      $approvals = '';
      if($role === 'headOfDepartment') {
        $approvals = DB::table('cuti')
        ->join('employee' , 'cuti.nik_employee' , '=' , 'employee.nik_employee')

        ->join('departemen' , 'departemen.id_departemen' , '=' , 'employee.id_departemen')
        ->join('cabang' , 'cabang.id_cabang' , '=' , 'employee.id_cabang')

        ->join('jenis_cuti' , 'jenis_cuti.id_jenis' , '=' , 'cuti.id_jenis')
        ->select('cuti.*' , 'employee.nama' , 'employee.nik_employee' , 'departemen.nama_departemen' , 'cabang.nama_cabang' , 'jenis_cuti.nama_jenis')
        ->where('cuti.status' , 'Menunggu Persetujuan HoD')
        ->get();
      }
      elseif ($role === 'hrManager') {
        $approvals = DB::table('cuti')
        ->join('employee' , 'cuti.nik_employee' , '=' , 'employee.nik_employee')

        ->join('departemen' , 'departemen.id_departemen' , '=' , 'employee.id_departemen')
        ->join('cabang' , 'cabang.id_cabang' , '=' , 'employee.id_cabang')

        ->join('jenis_cuti' , 'jenis_cuti.id_jenis' , '=' , 'cuti.id_jenis')
        ->select('cuti.*' , 'employee.nama' , 'employee.nik_employee' , 'departemen.nama_departemen' , 'cabang.nama_cabang' , 'jenis_cuti.nama_jenis')
        ->where('cuti.status' , 'Menunggu Persetujuan HRM')
        ->get();
      }

       $target = $request -> input('target');

       $cuti = Cuti::where('id' , $target) -> first();


       $cuti->status = 'Ditolak';

       $cuti -> save();

       // $email = $cuti -> employee -> email;

       $employee = Employee::where('nik_employee', $cuti->nik_employee)->first(); 

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
