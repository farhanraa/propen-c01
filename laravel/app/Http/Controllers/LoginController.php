<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;

class LoginController extends Controller
{
    //
	public function showLogin(){
		if(Auth::check()){
            return redirect('dashboard');
        }
        else return view('login');
    }

    public function doLogin(Request $request){

    	$userdata = array(
        	'email'     => $request->input('email'),
        	'password'  => $request->input('password')
    	);

    	if(Auth::attempt($userdata)){
    		return redirect('dashboard');
    	}

    	else{
            
            echo DB::table('users')->get();
    		echo "Email atau password salah";
    		return view('login');
    	}

    }
    public function doLogout(){
        if(Auth::check()){
            Auth::logout();
            echo 'Berhasil Logout';
        }
        return redirect('login');
    	
    }
}
