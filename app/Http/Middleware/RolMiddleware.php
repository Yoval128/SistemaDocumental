<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RolMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
      // Verifica si el usuario está autenticado
      if (!Auth::check()) {
        return redirect('/login'); // Redirige si no está logueado
    }

    // Verifica si el rol del usuario coincide con los permitidos
    $user = Auth::user();
    if (!in_array($user->rol, $roles)) {
        abort(403, 'No tienes permiso para acceder a esta página.'); // Respuesta 403
    }

    return $next($request); // Permite continuar
    }
}
