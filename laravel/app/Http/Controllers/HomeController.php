<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Report;
use App\cabang;
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
        $listOfCabang = cabang::get();
        $employee = Employee::where('id', Auth::user()->id_employee)->first();
        return view('dashboard', ['employee' => $employee, 'listOfCabang' => $listOfCabang]);  
    }
    public function sendEmail()
    {
        Mail::send('notif/the-email', ['title' => 'Harmonis - Mega Sekuritas'], function($message){
            $message->to('farhanraa@gmail.com')->subject('test');
        });
    }
}
