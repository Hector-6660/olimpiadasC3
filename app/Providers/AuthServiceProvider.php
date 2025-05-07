<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Categoria;
use App\Models\Centro;
use App\Models\Ciclo;
use App\Models\Edicion;
use App\Models\Grado;
use App\Models\Grupo;
use App\Models\Patrocinador;
use App\Models\Prueba;
use App\Models\Resultado;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Categoria::class => \App\Policies\CategoriaPolicy::class,
        Centro::class => \App\Policies\CentroPolicy::class,
        Ciclo::class => \App\Policies\CicloPolicy::class,
        Edicion::class => \App\Policies\EdicionPolicy::class,
        Grado::class => \App\Policies\GradoPolicy::class,
        Grupo::class => \App\Policies\GrupoPolicy::class,
        Patrocinador::class => \App\Policies\PatrocinadorPolicy::class,
        Prueba::class => \App\Policies\PruebaPolicy::class,
        Resultado::class => \App\Policies\ResultadoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::before(function (User $user) {
            // Check if the user is an admin
            if ($user->isAdmin()) {
                return true;
            }
        });
        // Define a gate for the 'store-inscripcion' action
        Gate::define('store-inscripcion', function (?User $user) {
            $edicion = Edicion::getEdicionActual();
            if ($edicion->fecha_apertura <= now() && $edicion->fecha_cierre >= now()) {
                return true;
            }
            return false;
        });
    }
}
