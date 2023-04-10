<?php


namespace App\Providers;


use App\Contract\Repository\SourceRepositoryInterface;
use App\Infrastructure\DatabaseRepository\SourceRepository;
use Illuminate\Support\ServiceProvider;

class SourceServiceProvider extends ServiceProvider
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
        # Repository
        $this->app->singleton(SourceRepositoryInterface::class, SourceRepository::class);
    }
}
