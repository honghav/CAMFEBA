<?php

namespace App\Providers;

use App\Repository\EventsRepository;
use App\Repository\Interface\EventsRepositoryInterface;
use Illuminate\Foundation\Console\EventCacheCommand;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\View\Components\EventCardComponent;
use App\View\Components\ServiceCard;

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
        Blade::component('event-card', EventCardComponent::class);
        Blade::component('service-card', ServiceCard::class);
    }
}
