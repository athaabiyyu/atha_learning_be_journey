<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        if ($request->input('token') !== 'my-secret-token') {
            return redirect('/home');
        }
        /* jika ada request input token dan token tidak sama dengan 'my-secret-token' maka akan diarahkan ke halaman home */
        return $next($request);
        /* jika sesuai maka lanjut ke request berikutnya */
    }
}
