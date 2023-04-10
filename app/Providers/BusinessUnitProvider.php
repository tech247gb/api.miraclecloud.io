<?php

namespace App\Providers;

use App\Domain\BusinessUnit\BusinessUnitRepositoryInterface;
use App\Infrastructure\DatabaseRepository\BusinessUnitRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * @package App\Providers
 */
class BusinessUnitProvider extends ServiceProvider
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
        $this->app->singleton(BusinessUnitRepositoryInterface::class, BusinessUnitRepository::class);
    }
}
