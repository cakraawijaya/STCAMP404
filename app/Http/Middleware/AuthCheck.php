<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    public function handle(Request $reqData, Closure $next)
    {
        if ($reqData->session()->has('LogSession')) {
            return $next($reqData);
        } else {
            return redirect()->route('registrasi');
        }
    }
}
