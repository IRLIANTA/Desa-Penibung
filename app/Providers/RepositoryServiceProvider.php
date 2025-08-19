<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Tempat binding interface ke repository implementation
        // Contoh:
        // $this->app->bind(
        //     \App\Repositories\EventRepositoryInterface::class,
        //     \App\Repositories\Eloquent\EventRepository::class
        // );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
