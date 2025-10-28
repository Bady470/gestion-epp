<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * When present, controller route declarations will automatically be prefixed with it.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers'; // no usar por defecto en Laravel 8+

    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            // API routes (routes/api.php)
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace) // normalmente null, mantener por compatibilidad
                ->group(base_path('routes/api.php'));

            // Web routes (routes/web.php)
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            // Ajusta el límite si lo deseas
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
