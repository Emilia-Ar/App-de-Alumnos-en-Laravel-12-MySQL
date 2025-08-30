<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user()?->is_admin) {
            abort(403, 'Acceso denegado. Solo administradores.');
        }

        return $next($request);
    }
}