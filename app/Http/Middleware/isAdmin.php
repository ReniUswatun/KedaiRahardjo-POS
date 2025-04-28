<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // pastin user login untuk admin
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 2) {
                return $next($request);
            }
        }
        // kalau bukan admin, tolak akses
        abort(403, 'Unauthorized, not able to access this route'); // atau redirect('/'), bebas
    }
}
