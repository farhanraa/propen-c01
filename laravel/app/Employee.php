<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $table = 'employee';
    public $timestamps = false;

    public function attendance(){

    	//ngedifine hubungan antara izin sama employee
    	return $this->hasMany('App\Attendance' , 'nik_employee');
    }

    public function cuti(){

    	//ngedifine hubungan antara cuti sama employee
    	return $this->hasMany('App\Cuti' , 'nik_employee');
    }

    public function dataClaim(){

    	//ngedifine hubungan antara izin sama employee
    	return $this->hasMany('App\DataClaim' , 'id');
    }
    public function claimOfEmployee(){
      return $this->hasMany('App\ClaimOfEmployee', 'id');
    }

    public function kontakDarurat(){
    	return $this->hasOne('App\kontakDarurat', 'id_employee');
    }

    public function bank(){
    	return $this->hasOne('App\Bank', 'id_employee');
    }

    public function pengalamanBerorganisasi(){
    	return $this->hasMany('App\pengalamanBerorganisasi', 'id_employee');
    }

    public function hobiDanPrestasi(){
    	return $this->hasMany('App\hobiDanPrestasi', 'id_employee');
    }

    public function kontrakPercobaan(){
    	return $this->hasMany('App\kontrakPercobaan', 'id_employee');
    }

   
    public function pendidikan(){
    	return $this->hasMany('App\pendidikan', 'id_employee');
    } 

    public function sertifikasi(){
        return $this->hasMany('App\sertifikat', 'id_employee');
    } 

    public function kemampuanBahasa(){
        return $this->hasMany('App\kemampuanBahasa', 'id_employee');
    } 

    public function lisensi(){
        return $this->hasMany('App\lisensi', 'id_employee');
    }
    public function overtime(){
    	return $this->hasMany('App\Overtime' , 'nik_employee');
    }

    public function pengalamanKerja(){
        return $this->hasMany('App\pengalamanKerja', 'id_employee');
    }
    
    public function keluarga(){
        return $this->hasMany('App\keluarga', 'id_employee');
    }

    public function keluargaOrangTua(){
        return $this->hasMany('App\keluargaOrangTua', 'id_employee');
    }

    public function mutasi(){
        return $this->hasMany('App\mutasi', 'id_employee');
    }

    public function surat(){
        return $this->hasMany('App\surat', 'id_employee');
    }

    public function kedisiplinan(){
        return $this->hasMany('App\kedisiplinan', 'id_employee');
    }

    public function dokumen(){
    	return $this->hasMany('App\dokumen', 'id_employee');
    }

    public function absensi(){
        return $this->hasMany('App\absensi', 'nomor_fingerprint');
    }

    public function cabang(){
        return $this->hasOne('App\cabang', 'id_cabang');
    }

    public function departemen(){
        return $this->hasOne('App\departemen', 'id_departemen');
    }

    public function jabatan(){
        return $this->hasOne('App\jabatan', 'id_jabatan');
    }

}
