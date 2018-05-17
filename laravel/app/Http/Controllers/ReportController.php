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
use Barryvdh\DomPDF\Facade as PDF;

class ReportController extends Controller{

	public function report(Request $request){

		$employee = Employee::where('nik_employee', Auth::user()->nik_employee)->first();

		$items = DB::table("Attendance")->get();
        view()->share('items',$items);


        if($request->has('download')){
            $pdf = PDF::loadView('reportIzin');
            return $pdf->download('reportIzin.pdf');
        }


        return view('report' , ['employee' => $employee]);
	}
}