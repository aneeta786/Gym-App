<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;


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
        $this->mapCustomRoutes();
    }
    protected function mapCustomRoutes()
    {
        Route::middleware('web')
            ->namespace('App\Http\Controllers')
            ->group(base_path('routes/admin.php'));
    }
}
