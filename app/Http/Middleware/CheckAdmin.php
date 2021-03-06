<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if(isset(auth()->user()->roles_name) and auth()->user()->roles_name  == "مدير"){
            return $next($request);

        }if (isset(auth()->user()->roles_name) and auth()->user()->roles_name  == "مشرف") {
            return $next($request);
        }
        else{
            return redirect()->route('home');

        }
    }
}
