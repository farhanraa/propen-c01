<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employee;
use App\absensi;
use DB;
use Auth;

class AbsenController extends Controller
{
    //
   	public function lihatAbsen(){
    	//fungsi
    	$id_fingerprint = Auth::user()->id_fingerprint;
	    $employee = Employee::where('nik_employee', Auth::user()->nik_employee)->first();
	    $absensi = DB::table('absensi')->where('id_fingerprint', $employee->id_fingerprint)->get();
	    // echo $employee;
	    return view('lihatAbsen', ['employee' => $employee, 'absensi' => $absensi]);

    }
}
