<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){     
            $user = Auth::user();
            if($user->role == 'headOfDepartment' || $user->role == 'hrManager' || $user->role == 'finance'){
                return $next($request);
            }
            else return redirect('dashboard'); 
        } 
        else return redirect('login');   
    }
}
