<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input; 
use App\dokumen;
use App\Employee;
use App\hobiDanPrestasi;
use App\kontakDarurat;
use App\Bank;
use App\kontrakPercobaan;
use App\pengalamanBerorganisasi;
use App\pendidikan;
use App\sertifikat;
use App\kemampuanBahasa;
use App\lisensi;
use App\surat;
use App\kedisiplinan;
use App\pengalamanKerja;
use App\keluarga;
use App\keluargaOrangTua;

use DB;
use Auth;

class ProfilController extends Controller
{
    //
    public function lihatProfil(){
        //fungsi

        $employee = Employee::where('nik_employee', Auth::user()->nik_employee)->first();
        $departemen = DB::table('departemen')->where('id_departemen', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id_cabang', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan')->where('id_jabatan', $employee->id_jabatan)->get();
        return view('lihatProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
    }

    public function download($file_name) {
    $file_path = public_path('download/'.$file_name);
    return response()->download($file_path);
  }

    public function formProfil(){
        //fungsi
        $employee = Employee::where('nik_employee', Auth::user()->nik_employee)->first();
        $departemen = DB::table('departemen')->where('id_departemen', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id_cabang', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan')->where('id_jabatan', $employee->id_jabatan)->get();
        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
    }

    public function formProfilSubmit(Request $request){
            $employee = Employee::where('nik_employee', Auth::user()->nik_employee)->first();

            if ($request->hasFile('uploadContainer')){

            $file = Input::file('uploadContainer');
            $destinationPath = public_path(). '/upload/';
            $filename = $file->getClientOriginalName();

            Input::file('uploadContainer')->move($destinationPath, $filename);
            
            $employee->foto = $filename;
            }
            // $email_baru = $request->input('email_perusahaan');
                        
            $employee->nama = $request->nama ;
            $employee->no_handphone = $request->no_handphone;
            $employee->email_perusahaan = $request->email_perusahaan;
            $employee->alamat_tempat_tinggal = $request->alamat;
            $employee->email =  $request->email;
            $employee->agama =  $request->agama;
            $employee->tinggi =  $request->tinggi;
            $employee->berat_badan =  $request->berat_badan;
            $employee->status_perkawinan =  $request->status_perkawinan;
            $employee->jenis_identitas =  $request->jenis_identitas;
            $employee->no_identitas =  $request->no_identitas;
            $employee->jalan_identitas =  $request->jalan_identitas;
            $employee->kota_identitas =  $request->kota_identitas;
            $employee->provinsi_identitas =  $request->provinsi_identitas;
            $employee->kode_pos_identitas =  $request->kode_pos_identitas;
            $employee->no_telepon =  $request->no_telepon;
            $employee->no_dplk =  $request->no_dplk;
            $employee->no_npwp =  $request->no_npwp;
            $employee->no_bpjs =  $request->no_bpjs;
            $employee->no_jamsostek =  $request->no_jamsostek;
            $employee->save();

        $departemen = DB::table('departemen')->where('id_departemen', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id_cabang', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan')->where('id_jabatan', $employee->id_jabatan)->get();
        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);

            
            
            //$email = $require->input('nik_employee');
        
    }

      public function tambahDokumen(Request $request){
            $file = Input::file('uploadDok');
            $destinationPath = public_path(). '/upload/';
            $filename = $file->getClientOriginalName();

            Input::file('uploadDok')->move($destinationPath, $filename);

             $employee = Employee::where('nik_employee', Auth::user()->nik_employee)->first();

             $dokumen = new dokumen;
             $dokumen->id_employee = $employee->id;
             $dokumen->nama_dokumen = $request->nama;
            $dokumen->nama_file = $filename;
            $dokumen->keterangan = $request->keterangan;

            $dokumen->save();

            

        $departemen = DB::table('departemen')->where('id_departemen', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id_cabang', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan')->where('id_jabatan', $employee->id_jabatan)->get();
        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }

      public function tambahHDP(Request $request){
             $employee = Employee::where('nik_employee', Auth::user()->nik_employee)->first();
            
             $hdp = new hobiDanPrestasi;
             $hdp->id_employee = $employee->id;
             $hdp->hobi = $request->hobi;
             $hdp->prestasi = $request->prestasi;

            $hdp->save();

           

                     $departemen = DB::table('departemen')->where('id_departemen', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id_cabang', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan')->where('id_jabatan', $employee->id_jabatan)->get();
        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }

      public function tambahPB(Request $request){

             $employee = Employee::where('nik_employee', Auth::user()->nik_employee)->first();

             $pb = new pengalamanBerorganisasi;
             $pb->id_employee = $employee->id;
             $pb->nama_organisasi = $request->nama_organisasi;
             $pb->jenis_organisasi = $request->jenis_organisasi;
             $pb->tahun_aktif = $request->tahun_aktif;
             $pb->jabatan = $request->jabatan;

            $pb->save();

           

            $departemen = DB::table('departemen')->where('id_departemen', $employee->id_departemen)->get();
            $cabang = DB::table('cabang')->where('id_cabang', $employee->id_cabang)->get();
            $jabatan = DB::table('jabatan')->where('id_jabatan', $employee->id_jabatan)->get();
            return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }

      public function tambahPD(Request $request){

            $employee = Employee::where('nik_employee', Auth::user()->nik_employee)->first();

             $pd = new pendidikan;
             $pd->id_employee = $employee->id;
             $pd->tingkat_pendidikan = $request->tingkat_pendidikan;
             $pd->nama_sekolah = $request->nama_sekolah;
             $pd->jurusan = $request->jurusan;
             $pd->tahun_masuk = $request->tahun_masuk;
             $pd->tahun_lulus = $request->tahun_lulus;
             $pd->ipk = $request->ipk;
             $pd->catatan = $request->catatan;
  

            $pd->save();

           

            $departemen = DB::table('departemen')->where('id_departemen', $employee->id_departemen)->get();
            $cabang = DB::table('cabang')->where('id_cabang', $employee->id_cabang)->get();
            $jabatan = DB::table('jabatan')->where('id_jabatan', $employee->id_jabatan)->get();
            return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }

      public function tambahSP(Request $request){

             $employee = Employee::where('nik_employee', Auth::user()->nik_employee)->first();

            
             $sp = new sertifikat; 
             $sp->id_employee = $employee->id;
             $sp->nama_sertifikat = $request->nama_sertifikat;
             $sp->tahun_sertifikat = $request->tahun_sertifikat;
             $sp->penyelenggara = $request->penyelenggara;
             $sp->catatan_sertifikat = $request->catatan_sertifikat;
             $sp->tingkat_sertifikat = $request->tingkat_sertifikat;

            $sp->save();

            

            $departemen = DB::table('departemen')->where('id_departemen', $employee->id_departemen)->get();
            $cabang = DB::table('cabang')->where('id_cabang', $employee->id_cabang)->get();
            $jabatan = DB::table('jabatan')->where('id_jabatan', $employee->id_jabatan)->get();
            return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }
      public function tambahBA(Request $request){

             $employee = Employee::where('nik_employee', Auth::user()->nik_employee)->first();


             $ba = new kemampuanBahasa;
             $ba->id_employee = $employee->id;
             $ba->nama_bahasa = $request->nama_bahasa;
             $ba->kemampuan_berbicara = $request->kemampuan_berbicara;
             $ba->kemampuan_menulis = $request->kemampuan_menulis;
  
            $ba->save();

            $departemen = DB::table('departemen')->where('id_departemen', $employee->id_departemen)->get();
            $cabang = DB::table('cabang')->where('id_cabang', $employee->id_cabang)->get();
            $jabatan = DB::table('jabatan')->where('id_jabatan', $employee->id_jabatan)->get();
            return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }

      public function tambahIK(Request $request){
            $employee = Employee::where('nik_employee', Auth::user()->nik_employee)->first();
             
             $ik = new kedisiplinan;
             $ik->id_employee = $employee->id;
             $ik->jenis = $request->jenis;
             $ik->subjek = $request->subjek;
            $ik->masa_berlaku = $request->masa_berlaku;
            $ik->review = $request->review;
            $ik->keterangan = $request->keterangan;             
  
            $ik->save();

                     $departemen = DB::table('departemen')->where('id_departemen', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id_cabang', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan')->where('id_jabatan', $employee->id_jabatan)->get();
        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }


      public function tambahSU(Request $request){
            
           $employee = Employee::where('nik_employee', Auth::user()->nik_employee)->first();

           $t =$request->input('tanggal');
            $split_tanggal = explode("/", $t);
            $tahun = $split_tanggal[2];
            $bulan = $split_tanggal[1];
            $hari = $split_tanggal[0];
            $tanggal = $tahun. '-' . $hari .'-' . $bulan;
             
             $su = new surat;
             $su->id_employee = $employee->id;
             $su->nomor = $request->nomor;
             $su->jenis = $request->jenis;
             $su->tanggal = $tanggal;
             $su->informasi = $request->informasi;
             
            $su->save();

                     $departemen = DB::table('departemen')->where('id_departemen', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id_cabang', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan')->where('id_jabatan', $employee->id_jabatan)->get();
        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }
      
      public function tambahLI(Request $request){
            $employee = Employee::where('nik_employee', Auth::user()->nik_employee)->first();
            
            $t =$request->input('tanggal');
            $split_tanggal = explode("/", $t);
            $tahun = $split_tanggal[2];
            $bulan = $split_tanggal[1];
            $hari = $split_tanggal[0];
            $tanggal = $tahun. '-' . $hari .'-' . $bulan;

             
            $th =$request->input('tanggal_hangus');
            $split_tanggal2 = explode("/", $th);
            $tahun2 = $split_tanggal2[2];
            $bulan2 = $split_tanggal2[1];
            $hari2 = $split_tanggal2[0];
            $tanggal_hangus = $tahun2. '-' . $hari2 .'-' . $bulan2;
             
             $li = new lisensi;
             $li->id_employee = $employee->id;
             $li->nomor= $request->nomor;
            $li->jenis_lisensi= $request->jenis_lisensi;
            $li->tanggal= $tanggal;
            $li->tanggal_hangus= $tanggal_hangus;

            $li->save();

                     $departemen = DB::table('departemen')->where('id_departemen', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id_cabang', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan')->where('id_jabatan', $employee->id_jabatan)->get();
        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }      


      public function tambahPK(Request $request){

             $employee = Employee::where('nik_employee', Auth::user()->nik_employee)->first();

             $pk = new pengalamanKerja;
             $pk->id_employee = $employee->id;
             $pk->nama_perusahaan = $request->nama_perusahaan;
             $pk->jabatan = $request->jabatan;
             $pk->jabatan_atasan_langsung = $request->jabatan_atasan_langsung;
             $pk->ringkasan_jenis_pekerjaan = $request->ringkasan_jenis_pekerjaan;
             $pk->alasan_keluar = $request->alasan_keluar;
             $pk->gaji_terakhir = $request->gaji_terakhir;    
             $pk->periode = $request->periode;       
  
            $pk->save();

                     $departemen = DB::table('departemen')->where('id_departemen', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id_cabang', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan')->where('id_jabatan', $employee->id_jabatan)->get();
        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }

      public function tambahK1(Request $request){
            $employee = Employee::where('nik_employee', Auth::user()->nik_employee)->first();

            $t =$request->input('tanggal_lahir');
            $split_tanggal = explode("/", $t);
            $tahun = $split_tanggal[2];
            $bulan = $split_tanggal[1];
            $hari = $split_tanggal[0];
            $tanggal_lahir = $tahun. '-' . $hari .'-' . $bulan;
             
             $k1 = new keluarga;
             $k1->id_employee = $employee->id;
             $k1->nama = $request->nama;
             $k1->hubungan = $request->hubungan;
             $k1->pendidikan = $request->pendidikan;
             $k1->tempat_lahir = $request->tempat_lahir;
             $k1->tanggal_lahir = $tanggal_lahir;
             $k1->jenis_kelamin = $request->jenis_kelamin;
             $k1->pekerjaan = $request->pekerjaan;

  
            $k1->save();

                     $departemen = DB::table('departemen')->where('id_departemen', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id_cabang', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan')->where('id_jabatan', $employee->id_jabatan)->get();
        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }

            public function tambahK2(Request $request){
            $employee = Employee::where('nik_employee', Auth::user()->nik_employee)->first();

            $t =$request->input('tanggal_lahir');
            $split_tanggal = explode("/", $t);
            $tahun = $split_tanggal[2];
            $bulan = $split_tanggal[1];
            $hari = $split_tanggal[0];
            $tanggal_lahir = $tahun. '-' . $hari .'-' . $bulan;
             
             $k2 = new keluargaOrangTua;
             $k2->id_employee = $employee->id;
             $k2->nama = $request->nama;
             $k2->hubungan = $request->hubungan;
             $k2->pendidikan = $request->pendidikan;
             $k2->tempat_lahir = $request->tempat_lahir;
             $k2->tanggal_lahir = $tanggal_lahir;
             $k2->jenis_kelamin = $request->jenis_kelamin;
             $k2->pekerjaan = $request->pekerjaan;
            $k2->no_telepon = $request->no_telepon;
  
            $k2->save();


                     $departemen = DB::table('departemen')->where('id_departemen', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id_cabang', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan')->where('id_jabatan', $employee->id_jabatan)->get();
        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }

      public function ubahKD(Request $request){
            $employee = Employee::where('nik_employee', Auth::user()->nik_employee)->first();
            
             $kontakDarurat = kontakDarurat::where('id_employee', $employee->id)->first();
             
             $kontakDarurat->nama_kontak = $request->nama_kontak;
             $kontakDarurat->hubungan_kontak = $request->hubungan_kontak;
             $kontakDarurat->alamat_kontak = $request->alamat_kontak;
             $kontakDarurat->kota_kontak = $request->kota_kontak;
             $kontakDarurat->provinsi_kontak = $request->provinsi_kontak;
             $kontakDarurat->kode_pos_kontak = $request->kode_pos_kontak;
             $kontakDarurat->no_telepon_kontak = $request->no_telp_kontak;
             $kontakDarurat->no_hp_kontak = $request->no_hp_kontak;

            $kontakDarurat->save();


        $departemen = DB::table('departemen')->where('id_departemen', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id_cabang', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan')->where('id_jabatan', $employee->id_jabatan)->get();
        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }


      public function ubahBank(Request $request){
             $employee = Employee::where('nik_employee', Auth::user()->nik_employee)->first();
             
             $bank = bank::where('id_employee', $employee->id)->first();
             
             $bank->nama_bank = $request->nama_bank;
             $bank->nomor_rekening_bank = $request->no_rekening_bank;
             $bank->nama_rekening = $request->nama_rekening;
             $bank->informasi_bank = $request->informasi_bank;
 

            $bank->save();

        $departemen = DB::table('departemen')->where('id_departemen', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id_cabang', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan')->where('id_jabatan', $employee->id_jabatan)->get();
        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }

            public function tambahKP(Request $request){

            $employee = Employee::where('nik_employee', Auth::user()->nik_employee)->first();

            $tw =$request->input('tanggal_awal');
            $split_tanggal = explode("/", $tw);
            $tahun = $split_tanggal[2];
            $bulan = $split_tanggal[1];
            $hari = $split_tanggal[0];
            $tanggal_awal = $tahun. '-' . $hari .'-' . $bulan;

             
            $ta =$request->input('tanggal_akhir');
            $split_tanggal2 = explode("/", $ta);
            $tahun2 = $split_tanggal2[2];
            $bulan2 = $split_tanggal2[1];
            $hari2 = $split_tanggal2[0];
            $tanggal_akhir = $tahun2. '-' . $hari2 .'-' . $bulan2;

             $kp = new kontrakPercobaan;
             $kp->id_employee = $employee->id;
             $kp->jenis = $request->jenis;
             $kp->keterangan = $request->keterangan;
             $kp->jangka_waktu = $request->jangka_waktu;
             $kp->tanggal_awal = $tanggal_awal; 
             $kp->tanggal_akhir = $tanggal_akhir; 

            $kp->save();

            $employee = Employee::where('nik_employee', '11000094')->first();

                     $departemen = DB::table('departemen')->where('id_departemen', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id_cabang', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan')->where('id_jabatan', $employee->id_jabatan)->get();
        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }




      public function formProfilSelesai(Request $request){
        $employee = Employee::where('nik_employee', Auth::user()->nik_employee)->first();
        $employee->status = "0";
        $employee->save();

        $departemen = DB::table('departemen')->where('id_departemen', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id_cabang', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan')->where('id_jabatan', $employee->id_jabatan)->get();
        return view('lihatProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
      }

}