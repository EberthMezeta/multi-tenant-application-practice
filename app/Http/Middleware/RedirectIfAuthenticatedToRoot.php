<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticatedToRoot
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario está autenticado
        if (auth()->check()) {
            // Si está autenticado, redirigir a la ruta raíz '/'
            return redirect("/");
        }

        // Permite que la solicitud continúe hacia la página de inicio de sesión
        return $next($request);
    }
}
