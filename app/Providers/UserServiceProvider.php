<?php

namespace App\Providers;

use App\Domain\User\UserRepositoryInterface;
use App\Infrastructure\DatabaseRepository\ServiceUserRepository;
use App\Infrastructure\DatabaseRepository\UserRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * @package App\Providers
 */
class UserServiceProvider extends ServiceProvider
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
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
    }
}
