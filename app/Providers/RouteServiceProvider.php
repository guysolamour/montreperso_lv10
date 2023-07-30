<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Symfony\Component\Finder\Finder;
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    const HOME = '/dashboard';

   

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(function () {
                  $this->getRoutesFor(base_path('routes/web/' . strtolower(config('administrable.front_namespace'))));
                });

            Route::prefix(config('administrable.auth_prefix_path'))
                ->middleware('web')
                ->namespace($this->namespace)
                ->group(function(){
                  $this->getRoutesFor(base_path('routes/web/' . strtolower(config('administrable.back_namespace'))));
                });
        });
    }



    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }



    protected function getRoutesFor(string $path)
    {
        $files = Finder::create()
            ->in($path)
            ->name('*.php');

        foreach ($files as $file)
            require $file->getRealPath();
    }
}
