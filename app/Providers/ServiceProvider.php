<?php


namespace App\Providers;

use App\Contract\Repository\ServiceRepositoryInterface;
use App\Infrastructure\DatabaseRepository\ServiceRepository;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
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
        $this->app->singleton(ServiceRepositoryInterface::class, ServiceRepository::class);
    }

}
