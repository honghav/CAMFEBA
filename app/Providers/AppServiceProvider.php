<?php

namespace App\Providers;

use App\Repository\ExcecutiveRepository;
use App\Repository\Interface\ExcecutiveRepositoryInterface;
use App\Repository\AboutsRepository;
use App\Repository\DashboardRepository;
use App\Repository\EventsRepository;
use App\Repository\Interface\AboutsRepositoryInterface;
use App\Repository\CategoryLegalRepository;
use App\Repository\Interface\CategoryLegalRepositoryInterface;
use App\Repository\Interface\DashboardRepositoryInterface;
use App\Repository\Interface\EventsRepositoryInterface;
use App\Repository\Interface\ProjectRepositoryInterface;
use App\Repository\Interface\TechnicalRepositoryInterface;
use App\Repository\ProjectRepository;
use App\Repository\TechnicalRepository;
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
        $this->app->bind(
            CategoryLegalRepositoryInterface::class,
            CategoryLegalRepository::class
        );
        $this->app->bind(
            \App\Repository\Interface\DocumentsRepositoryInterface::class,
            \App\Repository\DocumentsRepository::class
        );
        $this->app->bind(
            \App\Repository\Interface\SubmemberRepositoryInterface::class,
            \App\Repository\SubmemberRepository::class
        );
        $this->app->bind(
            \App\Repository\Interface\LayoutsRepositoryInterface::class,
            \App\Repository\LayoutsRepository::class
        );
        $this->app->bind(
            \App\Repository\Interface\QouteRepositoryInterface::class,
            \App\Repository\QouteRepository::class
        );
        $this->app->bind(
            ExcecutiveRepositoryInterface::class,
            ExcecutiveRepository::class
        );
        $this->app->bind(
            TechnicalRepositoryInterface::class,
            TechnicalRepository::class
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
