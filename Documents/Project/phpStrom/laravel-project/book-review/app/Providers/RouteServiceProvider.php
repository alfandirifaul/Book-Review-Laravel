<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as BaseRouteServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class RouteServiceProvider extends BaseRouteServiceProvider
{
    /**
     * Register services.
     */
    public const HOME = '\home';

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function(){
//            Route::middleware('api')
//                ->prefix('api')
//                ->group(base_path('routes/api.php'));

            Route::middleware('web')
            ->group(base_path('routes/web.php'));
        });
    }

    protected function configureRateLimiting(): void
    {
//        RateLimiter::for('api', function(Request $request){
//            return Limit::perMinuute(60)->by($request->user()?->id ?: $request->ip());
//        });

        RateLimiter::for('reviews', function(Request $request){
            return Limit::perHour(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
