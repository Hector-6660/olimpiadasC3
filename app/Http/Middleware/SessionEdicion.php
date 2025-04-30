<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Edicion;
use App\Models\Resultado;

class SessionEdicion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si ya hay una edición en la sesión
        if (!session()->has('edicion')) {
            // Obtener la edición actual y asignarla a la sesión si existe
            $edicion = Edicion::getEdicionActual();
            if ($edicion) {
                session(['edicion' => $edicion]);
            }
        }

        // Compartir la edición actual con todas las vistas
        if (session()->has('edicion')) {
            $edicion = session('edicion');
            view()->share('edicion', $edicion);

            // Buscar el resultado correspondiente a la edición y compartirlo a todas las vistas
            $resultado = Resultado::find($edicion->id);
            view()->share('resultado', $resultado);
        }

        return $next($request);
    }
}
