<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use session;

class CheckAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->get('adminId') != NULL){
            return $next($request);
        }
        else{
            session()->put('err_msg', 'Login First');
            return redirect()->route('adminLogin');
        }
    }
}
