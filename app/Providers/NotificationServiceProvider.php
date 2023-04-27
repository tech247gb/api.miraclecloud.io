<?php


namespace App\Providers;

use App\Contract\Repository\NotificationRepositoryInterface;
use App\Infrastructure\DatabaseRepository\NotificationRepository;
use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
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
        $this->app->singleton(NotificationRepositoryInterface::class, NotificationRepository::class);
    }

}
