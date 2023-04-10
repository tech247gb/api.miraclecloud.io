<?php

namespace App\Providers;

use App\Contract\Repository\DashboardTableRepositoryInterface;
use App\Contract\Repository\DynamicChartRepositoryInterface;
use App\Domain\ChartDashboard\ChartDashboardRepositoryInterface;
use App\Domain\Dashboard\DashboardRepositoryInterface;
use App\Infrastructure\DatabaseRepository\ChartDashboardRepository;
use App\Infrastructure\DatabaseRepository\DashboardRepository;
use App\Infrastructure\DatabaseRepository\DashboardTableRepository;
use App\Infrastructure\DatabaseRepository\DynamicChartRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * @package App\Providers
 */
class DashboardServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    public function boot()
    {
        ##Repository
        $this->app->singleton(DashboardRepositoryInterface::class, DashboardRepository::class);
        $this->app->singleton(ChartDashboardRepositoryInterface::class, ChartDashboardRepository::class);
        $this->app->singleton(DynamicChartRepositoryInterface::class, DynamicChartRepository::class);
        $this->app->singleton(DashboardTableRepositoryInterface::class, DashboardTableRepository::class);
    }
}
