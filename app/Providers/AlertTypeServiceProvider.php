<?php


namespace App\Providers;

use App\Contract\Repository\AlertTypeRepositoryInterface;
use App\Infrastructure\DatabaseRepository\AlertTypeRepository;
use Illuminate\Support\ServiceProvider;

class AlertTypeServiceProvider extends ServiceProvider
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
        $this->app->singleton(AlertTypeRepositoryInterface::class, AlertTypeRepository::class);
    }

}
