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
use App\JatahCuti;
use App\Attendance;
use App\dataClaim;
use App\claimOfEmployee;
use App\Overtime;
use App\absensi;
use App\Cuti;
use App\jabatan;


use DB;
use Auth;

class ProfilController extends Controller
{
    //
    public function lihatProfil(){
        //fungsi
        $employee = Employee::where('id', Auth::user()->id_employee)->first();
        $departemen = DB::table('departemen')->where('id', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan_karyawan')->where('id', $employee->id_jabatan)->get();
        return view('lihatProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
    }



    public function formProfil(){
        //fungsi
        $employee = Employee::where('id', Auth::user()->id_employee)->first();
        $departemen = DB::table('departemen')->where('id', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan_karyawan')->where('id', $employee->id_jabatan)->get();
        $kontakD = kontakDarurat::where('id_employee', $employee->id)->first();
        $bank = Bank::where('id_employee', $employee->id)->first();
    
           //copy attributes from original model
            $new_user = $employee->replicate();
    
            $new_user->push();
            
            $new_kontakD = $kontakD->replicate();
            $new_kontakD->id_employee = $new_user->id;
            $new_kontakD->push();
            
            $new_Bank = $bank->replicate();
            $new_Bank->id_employee = $new_user->id;
            $new_Bank->push();
            

            //reset relations on EXISTING MODEL (this way you can control which ones will be loaded
            $employee->relations = [];
            //load relations on EXISTING MODEL
            $employee->load('pendidikan','hobiDanPrestasi','pengalamanBerorganisasi','kontrakPercobaan','sertifikasi','kemampuanBahasa','lisensi','pengalamanKerja','keluarga','keluargaOrangTua','dokumen','mutasi','surat','kedisiplinan');
            //re-sync the child relationships
            $relations = $employee->getRelations();
            foreach ($relations as $relation) {
                foreach ($relation as $relationRecord) {
                $newRelationship = $relationRecord->replicate();
                $newRelationship->id_employee = $new_user->id;
                $newRelationship->push();
        }
    }


        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
    }

    public function formProfilSubmit(Request $request){
           $employee = Employee::where('id', Auth::user()->id_employee)->first();

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

        $departemen = DB::table('departemen')->where('id', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan_karyawan')->where('id', $employee->id_jabatan)->get();
        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);

            
            
            //$email = $require->input('nik_employee');
        
    }

      public function tambahDokumen(Request $request){
            $file = Input::file('uploadDok');
            $destinationPath = public_path(). '/upload/';
            $filename = $file->getClientOriginalName();

            Input::file('uploadDok')->move($destinationPath, $filename);

            $employee = Employee::where('id', Auth::user()->id_employee)->first();

             $dokumen = new dokumen;
             $dokumen->id_employee = $employee->id;
             $dokumen->nama_dokumen = $request->nama;
            $dokumen->nama_file = $filename;
            $dokumen->keterangan = $request->keterangan;

            $dokumen->save();

            

        $departemen = DB::table('departemen')->where('id', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan_karyawan')->where('id', $employee->id_jabatan)->get();
        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }

      public function tambahHDP(Request $request){
             $employee = Employee::where('id', Auth::user()->id_employee)->first();
            
             $hdp = new hobiDanPrestasi;
             $hdp->id_employee = $employee->id;
             $hdp->hobi = $request->hobi;
             $hdp->prestasi = $request->prestasi;

            $hdp->save();

           

                     $departemen = DB::table('departemen')->where('id', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan_karyawan')->where('id', $employee->id_jabatan)->get();
        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }

      public function tambahPB(Request $request){

             $employee = Employee::where('id', Auth::user()->id_employee)->first();

             $pb = new pengalamanBerorganisasi;
             $pb->id_employee = $employee->id;
             $pb->nama_organisasi = $request->nama_organisasi;
             $pb->jenis_organisasi = $request->jenis_organisasi;
             $pb->tahun_aktif = $request->tahun_aktif;
             $pb->jabatan = $request->jabatan;

            $pb->save();

           

            $departemen = DB::table('departemen')->where('id', $employee->id_departemen)->get();
            $cabang = DB::table('cabang')->where('id', $employee->id_cabang)->get();
            $jabatan = DB::table('jabatan_karyawan')->where('id', $employee->id_jabatan)->get();
            return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }

      public function tambahPD(Request $request){

            

            $employee = Employee::where('id', Auth::user()->id_employee)->first();

             $pd = new pendidikan;
             $pd->id_employee = $employee->id;
             $pd->tingkat_pendidikan = $request->tingkat_pendidikan;
             $pd->nama_sekolah = $request->nama_sekolah;
             $pd->jurusan = $request->jurusan;
             $pd->tahun_masuk = $request->tahun_masuk;
             $pd->tahun_lulus = $request->tahun_lulus;
             // $pd->ipk = $request->ipk;
             $pd->catatan = $request->catatan;
  

            $pd->save();

           

            $departemen = DB::table('departemen')->where('id', $employee->id_departemen)->get();
            $cabang = DB::table('cabang')->where('id', $employee->id_cabang)->get();
            $jabatan = DB::table('jabatan_karyawan')->where('id', $employee->id_jabatan)->get();
            return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }

      public function tambahSP(Request $request){

            $employee = Employee::where('id', Auth::user()->id_employee)->first();
            
             $sp = new sertifikat; 
             $sp->id_employee = $employee->id;
             $sp->nama_sertifikat = $request->nama_sertifikat;
             $sp->tahun_sertifikat = $request->tahun_sertifikat;
             $sp->penyelenggara = $request->penyelenggara;
             $sp->catatan_sertifikat = $request->catatan_sertifikat;
             $sp->tingkat_sertifikat = $request->tingkat_sertifikat;

            $sp->save();

            

            $departemen = DB::table('departemen')->where('id', $employee->id_departemen)->get();
            $cabang = DB::table('cabang')->where('id', $employee->id_cabang)->get();
            $jabatan = DB::table('jabatan_karyawan')->where('id', $employee->id_jabatan)->get();
            return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }
      public function tambahBA(Request $request){

             $employee = Employee::where('id', Auth::user()->id_employee)->first();


             $ba = new kemampuanBahasa;
             $ba->id_employee = $employee->id;
             $ba->nama_bahasa = $request->nama_bahasa;
             $ba->kemampuan_berbicara = $request->kemampuan_berbicara;
             $ba->kemampuan_menulis = $request->kemampuan_menulis;
  
            $ba->save();

            $departemen = DB::table('departemen')->where('id', $employee->id_departemen)->get();
            $cabang = DB::table('cabang')->where('id', $employee->id_cabang)->get();
            $jabatan = DB::table('jabatan_karyawan')->where('id', $employee->id_jabatan)->get();
            return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }

      public function tambahIK(Request $request){
            $employee = Employee::where('id', Auth::user()->id_employee)->first();
             
             $ik = new kedisiplinan;
             $ik->id_employee = $employee->id;
             $ik->jenis = $request->jenis;
             $ik->subjek = $request->subjek;
            $ik->masa_berlaku = $request->masa_berlaku;
            $ik->review = $request->review;
            $ik->keterangan = $request->keterangan;             
  
            $ik->save();

                     $departemen = DB::table('departemen')->where('id', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan_karyawan')->where('id', $employee->id_jabatan)->get();
        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }


      public function tambahSU(Request $request){
            
           $employee = Employee::where('id', Auth::user()->id_employee)->first();

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

                     $departemen = DB::table('departemen')->where('id', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan_karyawan')->where('id', $employee->id_jabatan)->get();
        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }
      
      public function tambahLI(Request $request){
            $employee = Employee::where('id', Auth::user()->id_employee)->first();
            
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

                     $departemen = DB::table('departemen')->where('id', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan_karyawan')->where('id', $employee->id_jabatan)->get();
        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }      


      public function tambahPK(Request $request){

             $employee = Employee::where('id', Auth::user()->id_employee)->first();

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

                     $departemen = DB::table('departemen')->where('id', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan_karyawan')->where('id', $employee->id_jabatan)->get();
        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }

      public function tambahK1(Request $request){
            $employee = Employee::where('id', Auth::user()->id_employee)->first();

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

                     $departemen = DB::table('departemen')->where('id', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan_karyawan')->where('id', $employee->id_jabatan)->get();
        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }

            public function tambahK2(Request $request){
            $employee = Employee::where('id', Auth::user()->id_employee)->first();

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


                     $departemen = DB::table('departemen')->where('id', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan_karyawan')->where('id', $employee->id_jabatan)->get();
        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }

      public function ubahKD(Request $request){
            $employee = Employee::where('id', Auth::user()->id_employee)->first();
            
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


        $departemen = DB::table('departemen')->where('id', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan_karyawan')->where('id', $employee->id_jabatan)->get();
        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }


      public function ubahBank(Request $request){
             $employee = Employee::where('id', Auth::user()->id_employee)->first();
             
             $bank = bank::where('id_employee', $employee->id)->first();
             
             $bank->nama_bank = $request->nama_bank;
             $bank->nomor_rekening_bank = $request->no_rekening_bank;
             $bank->nama_rekening = $request->nama_rekening;
             $bank->informasi_bank = $request->informasi_bank;
 

            $bank->save();

        $departemen = DB::table('departemen')->where('id', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan_karyawan')->where('id', $employee->id_jabatan)->get();
        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }

            public function tambahKP(Request $request){

            $employee = Employee::where('id', Auth::user()->id_employee)->first();

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

                     $departemen = DB::table('departemen')->where('id', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan_karyawan')->where('id', $employee->id_jabatan)->get();
        return view('formProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
            //$email = $require->input('nik_employee');
      }


      public function formProfilSelesai(Request $request){
        $employee = Employee::where('id', Auth::user()->id_employee)->first();
        $employee->status = "1";
        $employee->save();

        $departemen = DB::table('departemen')->where('id', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan_karyawan')->where('id', $employee->id_jabatan)->get();
        return view('lihatProfil', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
      }

    public function approval(){;
        $id_employee = Auth::user()->id_employee;
        $employee = Employee::where('id', $id_employee)->first();
        $status = "1";
        $employees = DB::table('employee')->join('departemen' , 'departemen.id' , '=' , 'employee.id_departemen')->join('cabang' , 'cabang.id' , '=' , 'employee.id_cabang')->where('status' , $status)->get();                            
        return view('ApprovalDataEmployee' , ['employee' => $employee,'employees' => $employees]);
    }

        public function lihatProfilApproval(Request $request){
        //fungsi

        $id = $request->input('nik_employee');
        $employee = Employee::where('nik_employee', $id)->first();
        $departemen = DB::table('departemen')->where('id', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan_karyawan')->where('id', $employee->id_jabatan)->get();
        return view('lihatProfilHr', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
    }

     public function approvalDiterima(Request $request){

        $nik_employee = $request->nik_employee;
        
        $employeei = Employee::where('nik_employee', $nik_employee)->first();

        
        $id_employee2 = Auth::user()->id_employee;

        $employee = Employee::where('id', $id_employee2)->first();

        $employeeTemp = DB::table('employee')->where('id', '!=', $employee->id)->where('nik_employee', $nik_employee)->first();

        echo $employeeTemp->id;

        DB::table('pendidikan')->where('id_employee', $employeeTemp->id)->delete();
        DB::table('hobi_dan_prestasi')->where('id_employee', $employeeTemp->id)->delete();
        DB::table('pengalaman_berorganisasi')->where('id_employee', $employeeTemp->id)->delete();
        DB::table('kontrak_percobaan')->where('id_employee', $employeeTemp->id)->delete();
        DB::table('sertifikat')->where('id_employee', $employeeTemp->id)->delete();
        DB::table('kemampuan_bahasa')->where('id_employee', $employeeTemp->id)->delete();
        DB::table('pengalaman_kerja')->where('id_employee', $employeeTemp->id)->delete();
        DB::table('keluarga')->where('id_employee', $employeeTemp->id)->delete();
        DB::table('keluarga_orang_tua')->where('id_employee', $employeeTemp->id)->delete();
        DB::table('dokumen')->where('id_employee', $employeeTemp->id)->delete();
        DB::table('mutasi')->where('id_employee', $employeeTemp->id)->delete();
        DB::table('surat')->where('id_employee', $employeeTemp->id)->delete();
        DB::table('kedisiplinan')->where('id_employee', $employeeTemp->id)->delete();
        DB::table('kontak_darurat')->where('id_employee', $employeeTemp->id)->delete();
        DB::table('bank')->where('id_employee', $employeeTemp->id)->delete();
        DB::table('lisensi')->where('id_employee', $employeeTemp->id)->delete();
        DB::table('employee')->where('id', $employeeTemp->id)->delete();

        $employeei->status = 0;
        $employeei->save();
        
        $status = "1";
        $employees = DB::table('employee')->join('departemen' , 'departemen.id' , '=' , 'employee.id_departemen')->join('cabang' , 'cabang.id' , '=' , 'employee.id_cabang')->where('status' , $status)->get();                            
        return view('ApprovalDataEmployee' , ['employee' => $employee,'employees' => $employees]);

    }

      public function approvalDitolak(Request $request){

        
        //Ambil  asli
        $nik_employee = $request->nik_employee;
        
        $employeei = Employee::where('nik_employee', $nik_employee)->first();

        
        $id_employee2 = Auth::user()->id_employee;

        $employee = Employee::where('id', $id_employee2)->first();

        $employeeTemp = Employee::where('id','!=',$employeei->id)->where('nik_employee', $nik_employee)->first();
        
            
        $jatahCuti = JatahCuti::where('id_employee', $employeei->id)->first();

            
            $new_jatahCuti = $jatahCuti->replicate();
            $new_jatahCuti->id_employee = $employeeTemp->id;
            $new_jatahCuti->push();
            
             $jabatan = jabatan::where('id_employee', $employeei->id)->first();
       
            
            $new_jabatan = $jabatan->replicate();
            $new_jabatan->id_employee = $employeeTemp->id;
            $new_jabatan->push();

            //reset relations on EXISTING MODEL (this way you can control which ones will be loaded
            $employeei->relations = [];
            //load relations on EXISTING MODEL
            $employeei->load('attendance','cuti','dataClaim','claimOfEmployee','overtime','absensi');
            //re-sync the child relationships
            $relations = $employeei->getRelations();
            foreach ($relations as $relation) {
                foreach ($relation as $relationRecord) {
                $newRelationship = $relationRecord->replicate();
                $newRelationship->id_employee = $employeeTemp->id;
                $newRelationship->push();
                 }
             }


            DB::table('users')->where('id_employee', $employeei->id)->update(['id_employee' => $employeeTemp->id]);

            DB::table('pendidikan')->where('id_employee', $employeei->id)->delete();
            DB::table('hobi_dan_prestasi')->where('id_employee', $employeei->id)->delete();
            DB::table('pengalaman_berorganisasi')->where('id_employee', $employeei->id)->delete();
            DB::table('kontrak_percobaan')->where('id_employee', $employeei->id)->delete();
            DB::table('sertifikat')->where('id_employee', $employeei->id)->delete();
            DB::table('kemampuan_bahasa')->where('id_employee', $employeei->id)->delete();
            DB::table('pengalaman_kerja')->where('id_employee', $employeei->id)->delete();
            DB::table('keluarga')->where('id_employee', $employeei->id)->delete();
            DB::table('keluarga_orang_tua')->where('id_employee', $employeei->id)->delete();
            DB::table('dokumen')->where('id_employee', $employeei->id)->delete();
            DB::table('mutasi')->where('id_employee', $employeei->id)->delete();
            DB::table('surat')->where('id_employee', $employeei->id)->delete();
            DB::table('kedisiplinan')->where('id_employee', $employeei->id)->delete();
            DB::table('kontak_darurat')->where('id_employee', $employeei->id)->delete();
            DB::table('bank')->where('id_employee', $employeei->id)->delete();
            DB::table('lisensi')->where('id_employee', $employeei->id)->delete();
            DB::table('jatah_cuti')->where('id_employee', $employeei->id)->delete();
            DB::table('attendance')->where('id_employee', $employeei->id)->delete();
            DB::table('cuti')->where('id_employee', $employeei->id)->delete();
            DB::table('data_klaim')->where('id_employee', $employeei->id)->delete();
            DB::table('klaim_karyawan')->where('id_employee', $employeei->id)->delete();
            DB::table('overtime')->where('id_employee', $employeei->id)->delete();
            DB::table('absensi')->where('id_employee', $employeei->id)->delete();
            DB::table('jabatan_karyawan')->where('id_employee', $employeei->id)->delete();
            DB::table('lisensi')->where('id_employee', $employeei->id)->delete();
            DB::table('employee')->where('id', $employeei->id)->delete();


        
        $status = "1";
        $employees = DB::table('employee')->join('departemen' , 'departemen.id' , '=' , 'employee.id_departemen')->join('cabang' , 'cabang.id' , '=' , 'employee.id_cabang')->where('status' , $status)->get();                            
        return view('ApprovalDataEmployee' , ['employee' => $employee,'employees' => $employees]);

    }


    public function lihatProfilSemua(){;
        $id_employee = Auth::user()->id_employee;
        $employee = Employee::where('id', $id_employee)->first();
        $employees = DB::table('employee')->join('departemen' , 'departemen.id' , '=' , 'employee.id_departemen')->join('cabang' , 'cabang.id' , '=' , 'employee.id_cabang')->where('status', '!=', 1)->get();                            
        return view('viewAllProfil' , ['employee' => $employee,'employees' => $employees]);
    }

    public function ProfilSemua(Request $request){
        //fungsi

        $nik_employee = $request->input('nik_employee');

        $employee = Employee::where('nik_employee', $nik_employee)->first();
        $departemen = DB::table('departemen')->where('id', $employee->id_departemen)->get();
        $cabang = DB::table('cabang')->where('id', $employee->id_cabang)->get();
        $jabatan = DB::table('jabatan_karyawan')->where('id', $employee->id_jabatan)->get();
        return view('lihatProfilHrSemua', ['employee' => $employee, 'departemen'=> $departemen, 'cabang' => $cabang, 'jabatan' => $jabatan]);
    }
}
