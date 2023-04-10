<?php

namespace App\Providers;

use App\Contract\Core\AuthServiceInterface;
use App\Contract\Core\JwtServiceInterface;
use App\Contract\Repository\SsoRepositoryInterface;
use App\Infrastructure\DatabaseRepository\SsoRepository;
use App\Infrastructure\Services\AuthService;
use App\Infrastructure\Services\JwtService;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
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

        $this->app->singleton(AuthServiceInterface::class, AuthService::class);
        $this->app->singleton(JwtServiceInterface::class, JwtService::class);
        $this->app->singleton(SsoRepositoryInterface::class, SsoRepository::class);
    }
}
