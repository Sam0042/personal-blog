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
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
            // 1. Pastikan user sudah login (Safety Check)
            // Jika belum login, arahkan ke halaman login
            if (!$request->user()) {
                return redirect()->route('login');
            }

            // 2. Cek apakah role user yang sedang aktif ada di dalam daftar yang diizinkan
            if (in_array($request->user()->role, $roles)) {
                return $next($request); // Lanjutkan permintaan ke tujuan
            }

            // 3. Jika tidak punya hak akses, gagalkan dengan pesan error 403 yang jelas
            abort(403, 'Maaf, Anda tidak memiliki hak akses untuk membuka halaman ini.');
        }
    }

