<?php

namespace App\Providers;

use App\Domain\Account\AccountRepositoryInterface;
use App\Domain\Client\ClientRepositoryInterface;
use App\Infrastructure\DatabaseRepository\AccountRepository;
use App\Infrastructure\DatabaseRepository\ClientRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * @package App\Providers
 */
class ClientServiceProvider extends ServiceProvider
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
        $this->app->singleton(ClientRepositoryInterface::class, ClientRepository::class);
        $this->app->singleton(AccountRepositoryInterface::class, AccountRepository::class);
    }
}
