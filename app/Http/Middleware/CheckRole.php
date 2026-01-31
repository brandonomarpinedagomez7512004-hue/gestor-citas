<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
  public function handle(Request $request, Closure $next, $role)
{
    // Verificamos si el usuario tiene el rol necesario
    if (!auth()->check() || auth()->user()->role !== $role) {
        return redirect('/dashboard')->with('error', 'Acceso denegado.');
    }

    return $next($request);
}
}
