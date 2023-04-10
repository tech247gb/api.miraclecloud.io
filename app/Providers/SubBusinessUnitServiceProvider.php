<?php


namespace App\Providers;


use App\Contract\Repository\SubBusinessUnitRepositoryInterface;
use App\Infrastructure\DatabaseRepository\SubBusinessUnitRepository;
use Illuminate\Support\ServiceProvider;

class SubBusinessUnitServiceProvider extends ServiceProvider
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
        $this->app->singleton(SubBusinessUnitRepositoryInterface::class, SubBusinessUnitRepository::class);
    }
}
