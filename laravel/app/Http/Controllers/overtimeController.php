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
    ubah format tanggal / menjadi -
    */
     $tanggal =$request->input('tanggalLembur');
     $split_tanggal = explode("-", $tanggal);
     $tahun = $split_tanggal[0];
     $bulan = $split_tanggal[1];
     $hari = $split_tanggal[2];
     $tanggal_permohonan = $tahun . '-' . $bulan .'-' . $hari;
     
     //ubah format waktu menjadi 24 jam
     $waktuMulai = $request->input('jamMulai');
     
     $split_waktu_mulai = explode(" ", $waktuMulai);
     $jamMulai = $split_waktu_mulai[0];
     if ($split_waktu_mulai[1] === "PM") {
        $split_jam = explode(":", $jamMulai);
        $jam_change = (int) $split_jam[0] + 12;
        
        if ((int)$split_jam[0] === 12) {
            $jam_change = 12;
        }
        
        $jamMulai = $jam_change . ":" . $split_jam[1];
       //$jam = $jam_change . ":" . $split_jam[1];
     } 
     $waktuSelesai = $request->input('jamSelesai');
     $split_waktu_selesai = explode(" ", $waktuSelesai);
     $jamSelesai = $split_waktu_selesai[0];
     if ($split_waktu_selesai[1] === "PM") {
        $split_jam = explode(":", $jamSelesai);
        $jam_change_selesai = (int) $split_jam[0] + 12;
        if((int) $split_jam[0] === 12) {
            $jam_change_selesai = 12;
        }
        $jamSelesai = $jam_change_selesai . ":" . $split_jam[1];
     }
     $tujuan = $request->input('alasan');
     $status = 'Menunggu Persetujuan HoD';
     $overtime = new Overtime;
     $overtime->id_employee = $id_employee;
     $overtime->tanggal = $tanggal_permohonan;
     $overtime->waktu_mulai = $jamMulai;
     $overtime->waktu_selesai = $jamSelesai;
     $overtime->status = $status;
     $kodePengajuan = DB::table('overtime')->count() + 1;
    if($kodePengajuan < 10){
        $kodePengajuan = '00' . $kodePengajuan;
    }else if($kodePengajuan < 100){
        $kodePengajuan = '0' . $kodePengajuan;
    }
     $overtime->kode_pengajuan = 'KDL' . $kodePengajuan;
     $overtime->alasan = $tujuan;

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
        $today = date("Y-m-d");
        return view('formLembur' , ['result' => $result, 'employee' => $employee , 'today' => $today]);
       // return view('formLembur' , ['result' => $result, 'employee' => $employee]);
    }
    //nampilin tabel approval
    public function approvalLembur ()
    {
        $employee = Employee::where('id', Auth::user()->id_employee)->first();

        $riwayatPengajuan = DB::table('overtime') ->join('employee' , 'overtime.id_employee' , '=' , 'employee.id')
                                        ->select('overtime.tanggal' ,'overtime.waktu_mulai' , 'overtime.waktu_selesai' , 'overtime.status' ,'overtime.id', 'overtime.alasan', 'employee.nama')
                                        ->get();
        if(Auth::user()->role === 'headOfDepartment'){
            $listPengajuan = DB::table('overtime')
            ->join('employee', 'overtime.id_employee', '=', 'employee.id')
            ->select('employee.nama', 'overtime.tanggal' ,'overtime.waktu_mulai' , 'overtime.waktu_selesai' , 'overtime.status' ,'overtime.id', 'overtime.alasan')
            ->where('overtime.status', "Menunggu Persetujuan HoD")
            ->get();
        }
        elseif (Auth::user()->role === 'hrManager') {
            # code...
             $listPengajuan = DB::table('overtime')
            ->join('employee', 'overtime.id_employee', '=', 'employee.id')
            ->select('employee.nama', 'overtime.tanggal' ,'overtime.waktu_mulai' , 'overtime.waktu_selesai' , 'overtime.status' ,'overtime.id', 'overtime.alasan')
            ->where('overtime.status', "Menunggu Persetujuan HRM")
            ->get();
        }

        return view('FormApprovalLembur' , ['listPengajuan' => $listPengajuan ,'employee' => $employee, 'riwayatPengajuan' => $riwayatPengajuan]);
    }
     public function approved(Request $request){
        $target = $request->input('target');
        $overtime = Overtime::where('id' , $target)->first(); //satu baris
        $employee = Employee::where('id', $overtime->id_employee)->first();

        if(Auth::user()->role === 'headOfDepartment'){
            $overtime->status = 'Menunggu Persetujuan HRM';
        }
        else if(Auth::user()->role === 'hrManager'){
            $overtime->status = 'Diterima';
        }
        $overtime->save();
        
        return redirect('/overtime/approval')->with('alert','Permintaan ' .$employee->nama . ' ' .'Disetujui');
    }
     public function reject(Request $request){
        $target = $request->input('target');
        $overtime = Overtime::where('id', $target)->first();
        $overtime->status = 'Ditolak';

        $employee = Employee::where('id', $overtime->id_employee)->first();
        $overtime->save();

        return redirect('/overtime/approval')->with('alert','Permintaan ' .$employee->nama . ' ' .'Ditolak');
    }
    public function batal(Request $request){
        $target = $request->input('target');
        $overtime = Overtime::where('id', $target)->first();
        $overtime->status = 'Dibatalkan';
        $employee = Employee::where('id', $overtime->id_employee)->first();
        $overtime->save();

        // $email = $attendance -> employee -> email;

        // Mail::to($email)->send(new NotifikasiDitolak());

        // $nama = $attendance->employee->nama;

        return redirect('/overtime/form')->with('alert','Permintaan Anda Dibatalkan');
    }

}

