<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Report;
use App\cabang;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon;
use Auth;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon\Carbon::now();
        $year = $today->year;
        $month = ($today->month)-1;
        if($month === 0){
            $month = 12;
            $year = $year - 1;
         }

        else if($month === 1){

            $currMonth = 'Januari';
         }
         else if($month === 2){

            $currMonth = 'Februari';
         }

         else if($month === 3){

            $currMonth = 'Maret';
         }

         else if($month === 4){

            $currMonth = 'April';
         }

         else if($month === 5){

            $currMonth = 'Mei';
         }

         else if($month === 6){

            $currMonth = 'Juni';
         }

         else if($month === 7){

            $currMonth = 'Juli';
         }

         else if($month === 8){

            $currMonth = 'Agustus';
         }

         else if($month === 9){

            $currMonth = 'September';
         }

         else if($month === 10){

            $currMonth = 'Oktober';
         }

         else if($month === 11){

            $currMonth = 'November';
         }

         else if($month === 12){

            $currMonth = 'Desember';
         }
        $listOfCabang = cabang::get();
        $reports = Report::get();
        $reportBulanLalu = Report::where('bulan', $currMonth)->where('tahun', $year)->get();
        $employee = Employee::where('id', Auth::user()->id_employee)->first();
        return view('dashboard', ['employee' => $employee, 
                                    'listOfCabang' => $listOfCabang,
                                    'reports' => $reports,
                                    'todayYear' => $today->year,
                                    'todayMonth' => $today->format('F'),
                                    'reportBulanLalu' => $reportBulanLalu]);  
    }
    public function sendEmail()
    {
        Mail::send('notif/the-email', ['title' => 'Harmonis - Mega Sekuritas'], function($message){
            $message->to('farhanraa@gmail.com')->subject('test');
        });
    }
}
