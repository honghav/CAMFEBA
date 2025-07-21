<?php

namespace App\Providers;

use App\Repository\AboutsRepository;
use App\Repository\DashboardRepository;
use App\Repository\EventsRepository;
use App\Repository\Interface\AboutsRepositoryInterface;
use App\Repository\Interface\DashboardRepositoryInterface;
use App\Repository\Interface\EventsRepositoryInterface;
use App\Repository\Interface\ProjectRepositoryInterface;
use App\Repository\ProjectRepository;
use Illuminate\Foundation\Console\EventCacheCommand;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\View\Components\EventCardComponent;
use App\View\Components\ProjectCrad;
use App\View\Components\ServiceCard;
use App\View\Components\SubServiceCard;
use App\View\Components\tableOfUser;

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
        $this->app->bind(
            DashboardRepositoryInterface::class,
            DashboardRepository::class
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
        Blade::component('project-crad', ProjectCrad::class);
        Blade::component('table-of-user', tableOfUser::class);
    }
}
