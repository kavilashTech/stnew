<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        // $guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }

        // return $next($request);

        $prefix =  $prefix = $request->segment(1);
        // if (isset($prefix))
        // {
        //     if($prefix == "admin"){
        //         return redirect('admin/dashboard');
        //     }else{
        //         if($prefix == "owner"){
        //             return redirect('owner/dashboard');
        //         }
        //         return $next($request); 
        //     }
        // }   
        if ($prefix == "admin") {
            if (Auth::guard('admin')->check()) {
                return redirect('admin/dashboard');
            }
        }
        // else if($prefix == "owner"){
        //     if (Auth::guard('web')->check()) {
        //                 return redirect('owner/dashboard');
        //             // return $next($request);
        //             }
        // }---
        // if($prefix == "owner")
        // {
        //     if (Auth::guard('web')->check()) {
        //         return redirect('owner/dashboard');
        //     // return $next($request);
        //     }
        // }
         
        return $next($request); 
    }
}
