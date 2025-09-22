<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    // Ubah method handle menjadi seperti ini
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Cek apakah role user yang sedang login ada di dalam daftar role yang diizinkan
        if (! in_array($request->user()->role, $roles)) {
            // Jika tidak, tolak akses
            abort(403, 'UNAUTHORIZED ACTION.');
        }

        // Jika ya, izinkan akses
        return $next($request);
    }
}