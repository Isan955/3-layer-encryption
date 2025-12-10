<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RaspMonitor
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ambil semua input dari user
        $inputs = $request->all();

        foreach ($inputs as $key => $value) {
            // Kita hanya memeriksa input yang berupa string
            if (is_string($value)) {
                
                // Definisi Pola Serangan (Regex)
                $patterns = [
                    '/union\s+select/i',      // Deteksi UNION SELECT (case insensitive)
                    '/or\s+1=1/i',            // Deteksi ' OR 1=1 --
                    '/--/',                   // Deteksi komentar SQL
                    '/<script>/i',            // Deteksi XSS dasar
                    '/javascript:/i',         // Deteksi XSS via protokol
                    '/;/'                     // Deteksi Command Chaining
                ];

                foreach ($patterns as $pattern) {
                    if (preg_match($pattern, $value)) {
                        // Jika pola ditemukan, hentikan proses (RASP Blocking)
                        abort(403, 'Serangan Terdeteksi! Request Anda mengandung karakter berbahaya.');
                    }
                }
            }
        }

        return $next($request);
    }
}