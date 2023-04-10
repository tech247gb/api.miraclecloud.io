<?php

namespace App\Providers;

use App\Contract\CommandBus\CommandBusInterface;
use App\Infrastructure\Services\CommandBusService;
use Illuminate\Support\ServiceProvider;

/**
 * Class CommandBusProvider
 * @package App\Providers
 */
class CommandBusProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(CommandBusInterface::class, CommandBusService::class);
    }
}
