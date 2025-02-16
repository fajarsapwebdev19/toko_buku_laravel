<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // jika pengguna login
        if(Auth::check())
        {
            if(!empty($roles) && !in_array(Auth::user()->role_id, $roles))
            {
                abort(403);
            }

            // Jika pengguna telah login dan tidak mencoba mengakses halaman login, lanjutkan permintaan
            return $next($request);
        }

        // Jika pengguna belum login, arahkan ke halaman login
        return redirect('/auth_sad?message=Belum Login');
    }
}
