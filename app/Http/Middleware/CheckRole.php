<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($role === 'admin' && $user->role_id != 1) {
                return redirect('/user');
            } elseif ($role === 'user' && $user->role_id != 0) {
                return redirect('/admin');
            }
        }

        return $next($request);
    }
}