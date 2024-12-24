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
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Cek apakah user memiliki role yang diharapkan
        if ($request->user() && $request->user()->role === $role) {
            return $next($request);
        }

        // Jika tidak memiliki role yang sesuai, bisa mengalihkan atau mengembalikan respon error
        return redirect('/'); // Ganti dengan halaman yang sesuai
    }
}
