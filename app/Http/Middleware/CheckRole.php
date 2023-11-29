<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
        public function handle(Request $request, Closure $next, ...$roles)
        {
            if (in_array($request->user()->role, $roles)) {
                return $next($request); 
            }
            abort(403); 
            // if (auth()->check()) {
            //     // Pengguna sudah login, lanjutkan request
            //     return $next($request);
            // } else {
            //     // Pengguna belum login, redirect ke halaman login
            //     return redirect('/login');
    }
}
