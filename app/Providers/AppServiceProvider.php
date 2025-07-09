<?php

namespace App\Providers;

use App\Repository\EventsRepository;
use App\Repository\Interface\EventsRepositoryInterface;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(
        EventsRepositoryInterface::class,
        EventsRepository::class
    );

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
