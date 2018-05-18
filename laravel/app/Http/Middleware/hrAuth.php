<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class hrAuth
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
            if($user->role == 'adminCab'){
                return $next($request);
            }
            else return redirect('dashboard'); 
        } 
        else return redirect('login');   
    }
}
