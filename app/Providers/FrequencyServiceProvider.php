<?php


namespace App\Providers;


use App\Contract\Repository\FrequencyRepositoryInterface;
use App\Infrastructure\DatabaseRepository\FrequencyRepository;
use Illuminate\Support\ServiceProvider;

class FrequencyServiceProvider extends ServiceProvider
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
        $this->app->singleton(FrequencyRepositoryInterface::class, FrequencyRepository::class);
    }

}
