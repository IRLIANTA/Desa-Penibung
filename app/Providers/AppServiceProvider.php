<?php

namespace App\Providers;

use App\Http\Middleware\CekAdmin;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Hotfix: tambahkan binding "files"
        $this->app->singleton('files', function ($app) {
            return new Filesystem;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         Route::aliasMiddleware('cekAdmin', CekAdmin::class);
    }
}
