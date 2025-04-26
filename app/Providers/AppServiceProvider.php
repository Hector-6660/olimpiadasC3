<?php

namespace App\Providers;

use App\Models\Edicion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('inscripciones-abiertas', function () {
            $edicion = Edicion::getEdicionActual();
            $hoy = now();

            $entreFechas = $hoy->between($edicion->fecha_apertura, $edicion->fecha_cierre);
            $esAdmin = Auth::check() && Auth::user()->email === env('ADMIN_EMAIL');

            return $entreFechas || $esAdmin;
        });
    }
}
