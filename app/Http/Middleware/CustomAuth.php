<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth\SessionGuard;
class CustomAuth
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
        // $path= $request->path();
        // if(($path=="login" || $path=="register") && (Session::get('user'))){
        //     return redirect('/');
        // }else if($path=="out" && (Session::get('user'))){
        //     session()->forget('user');
        //     return redirect('/');
        // }
        // else if(($path=='add' || $path=='list') && (!Session::get('user')))
        // {    
        //     return redirect('/login');
        // }
        // else if($path=="/" && (!Session::get('user'))){
        //     return rediret('/');
        // }

        // $path= $request->path();
        // if(($path=="login" || $path=="register") && (SessionGuard::get('user'))){
        //     return redirect('/');
        // }else if($path=="out" && (SessionGuard::get('user'))){
        //     session()->forget('user');
        //     return redirect('/');
        // }
        // else if(($path=='add' || $path=='list') && (!SessionGuard::get('user')))
        // {    
        //     return redirect('/login');
        // }
        // else if($path=="/" && (!Auth::get('user'))){
        //     return rediret('/');
        // }
        return $next($request);
    }
}
