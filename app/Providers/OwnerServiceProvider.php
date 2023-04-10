<?php


namespace App\Providers;

use App\Contract\Repository\OwnerRepositoryInterface;
use App\Infrastructure\DatabaseRepository\OwnerRepository;
use Illuminate\Support\ServiceProvider;

class OwnerServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //

    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {

        # Repository
        $this->app->singleton(OwnerRepositoryInterface::class, OwnerRepository::class);
    }

}
