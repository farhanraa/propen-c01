<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input; 
use App\Employee;
use App\absensi;
use App\Cabang;
use App\UploadAbsensi;
use DB;
use Auth;

class AbsenController extends Controller
{
    //
    public function lihatAbsen(){
      //fungsi

      $id_employee = Auth::user()->id_employee;
      $employee = Employee::where('id', $id_employee)->first();
      $absensi = absensi::where('id_employee', $id_employee)->get();
      // echo $employee;
      return view('lihatAbsen', ['employee' => $employee, 'absensi' => $absensi]);

    }
      public function uploadAbsen(Request $request){
      $id_employee = Auth::user()->id_employee;
      $employee = Employee::where('id', $id_employee)->first();
      //fungsi
        $status = "1";
        $uploadAbsensi = DB::table('upload_absensi')->select('tanggal' ,'nama_cabang' , 'nama_file' , 'status')
                                         ->where('status' , $status)
                                         ->get();

        //$result = Attendance::all();

    $cabang = DB::table('cabang')->get();
    return view('uploadAbsen' , ['employee' => $employee, 'uploadAbsensi' => $uploadAbsensi, 'cabang' => $cabang]);
  }

    public function tambahAbsen(Request $request){

          $tanggal =$request->input('tanggal');
          $split_tanggal = explode("/", $tanggal);
          $tahun = $split_tanggal[2];
          $bulan = $split_tanggal[1];
          $hari = $split_tanggal[0];
          $tanggal_absensi = $tahun. '-' . $hari .'-' . $bulan;

        
        $upload = $request->file('upload');
        $filePath = $upload->getRealPath();
 



        if (($handle = fopen ($filePath, 'r')) !== FALSE) {
        while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
            

            $newAbsensi = new absensi;

            $id_fingerprint = $data [0];

            $employee = Employee::where('id_fingerprint', $id_fingerprint)->first();


            $newAbsensi->id_employee = $employee->id;
            $newAbsensi->nama_cabang = $request->nama_cabang;
            $newAbsensi->tanggal = $tanggal_absensi;
            $newAbsensi->jam_datang = $data [1];
            $newAbsensi->jam_pulang = $data [2];
            $newAbsensi->keterangan = $data [3];
            $newAbsensi->overtime = $data [4];
            $newAbsensi->save();

            }
            fclose ( $handle );
        }

            $file = Input::file('upload');
            $destinationPath = public_path(). '/upload/';
            $filename = $file->getClientOriginalName();

            Input::file('upload')->move($destinationPath, $filename);

            $upload_absensi = new UploadAbsensi;
            $upload_absensi->tanggal = $tanggal_absensi;
            $upload_absensi->nama_cabang = $request->nama_cabang;
            $upload_absensi->nama_file = $filename;
            $upload_absensi->status = "1";
            $upload_absensi->save();

              return redirect('/absen/upload')->with('alert','Upload Absen Berhasil');

      }


    public function hapusAbsen(Request $request){

        $tanggal = $request->input('tg_absen');
        $nama_cabang = $request->input('nm_cabang');  


         $absensis = DB::table('absensi')->where('nama_cabang' , $nama_cabang)->where('tanggal' , $tanggal)->delete(); 
         $uploadHapus = DB::table('upload_absensi')->where('nama_cabang' , $nama_cabang)->where('tanggal' , $tanggal)->delete(); 



        return redirect('/absen/upload')->with('alert','Absensi telah Dihapus');


    }

    public function download($file_name) {
    $file_path = public_path('download/'.$file_name);
    return response()->download($file_path);
  }
        public function lihatAbsenSemua(){;
        $id_employee = Auth::user()->id_employee;
        $employee = Employee::where('id', $id_employee)->first();
        
        $upload_absensis = DB::table('upload_absensi')->get();         

        return view('viewAllAbsensi' , ['employee' => $employee,'upload_absensis' => $upload_absensis]);
    }

        public function AbsenSemua(Request $request){
        //fungsi

        $id_employee = Auth::user()->id_employee;
        $employee = Employee::where('id', $id_employee)->first();
        $tanggal = $request->input('tanggal');
        $nama_cabang =  $request->input('nama_cabang'); 



        $absensis = DB::table('absensi')->join('employee' , 'employee.id' , '=' , 'absensi.id_employee')->where('absensi.nama_cabang', $nama_cabang)->where('absensi.tanggal', $tanggal)->get(); 


        return view('lihatAbsenHrSemua', ['employee' => $employee, 'absensis' => $absensis]);
    }

    
    
}

