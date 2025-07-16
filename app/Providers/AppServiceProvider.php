<?php

namespace App\Providers;

use App\Repository\AboutsRepository;
use App\Repository\EventsRepository;
use App\Repository\Interface\AboutsRepositoryInterface;
use App\Repository\Interface\EventsRepositoryInterface;
use App\Repository\Interface\ProjectRepositoryInterface;
use App\Repository\ProjectRepository;
use Illuminate\Foundation\Console\EventCacheCommand;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\View\Components\EventCardComponent;
use App\View\Components\ServiceCard;
use App\View\Components\SubServiceCard;

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
        $this->app->bind(
            AboutsRepositoryInterface::class,
            AboutsRepository::class
        );
        $this->app->bind(
            ProjectRepositoryInterface::class,
            ProjectRepository::class
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
        Blade::component('sub-service-card', SubServiceCard::class);
    }
}
