<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Verificamos si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Obtenemos el rol del usuario
        $userRole = Auth::user()->rol;

        // Comprobamos si el rol del usuario está en la lista de roles permitidos
        if (!in_array($userRole, $roles)) {
            // Si el rol no tiene acceso, redirigimos a una página de error o al dashboard
            return redirect()->route('dashboard')->with('error', 'No tienes acceso a esta página.');
        }

        return $next($request);
    }
}
