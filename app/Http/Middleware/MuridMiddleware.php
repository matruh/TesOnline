<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MuridMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna adalah admin dan sudah login
        if (Auth::check() && Auth::user()->role === 'murid') {
            return $next($request);
        }

        // Jika tidak, redirect atau tampilkan pesan error
        return redirect('/login')->with('error', 'You do not have ,murid access.');
    }
}
