<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleRedirect
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $role = auth()->user()->role;

            if ($role === 'admin' && !$request->is('admin/dashboard*')) {
                return redirect('/admin/dashboard');
            }

            if ($role === 'user' && !$request->is('home*')) {
                return redirect('/home');
            }
        }

        return $next($request);
    }
}
