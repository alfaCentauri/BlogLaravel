<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
/**
 * Clase MenuServiceProviders, permite cargar el menu de la vista publica como un servicio.
 *
 * @author Ingeniero en Computación: Ricardo Presilla.
 * @version 1.0.
 */
class MenuServiceProviders extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['welcome', 'publico.category'], 'App\Http\ViewComposers\MenuComposer');
    }
}
