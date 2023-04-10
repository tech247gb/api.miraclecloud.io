<?php


namespace App\Providers;

use App\Contract\Repository\AlertRepositoryInterface;
use App\Infrastructure\DatabaseRepository\AlertRepository;
use Illuminate\Support\ServiceProvider;

class AlertServiceProvider extends ServiceProvider
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
        $this->app->singleton(AlertRepositoryInterface::class, AlertRepository::class);
    }

}
