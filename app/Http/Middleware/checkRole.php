<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkRole
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

        return $next($request);
        $object = explode("/", $request->path());
        if(count($object)>1){
            $this->CanRead($object);/*
        dd($object);*/}

        if(count($object)==3 && $object[2] == 'create'){
            $this->CanCreate($object);
        }

        return $next($request);
    }

    public function CanRead($object)
    {

        $temp = $object[1];
        //dd(Auth::user()->role->$temp);
        if (Auth::user()->role->$temp < 8) {
            abort('403');
        }

    }

    public function CanCreate($object)
    {
        $temp = $object[1];
        //dd(Auth::user()->role->$temp);
        if (Auth::user()->role->$temp < 12) {
            abort('403');
        }

    }
}
