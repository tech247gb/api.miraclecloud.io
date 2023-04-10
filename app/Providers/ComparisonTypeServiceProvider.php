<?php


namespace App\Providers;


use App\Contract\Repository\ComparisonTypeRepositoryInterface;
use App\Infrastructure\DatabaseRepository\ComparisonTypeRepository;
use \Illuminate\Support\ServiceProvider;

class ComparisonTypeServiceProvider extends ServiceProvider
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
        $this->app->singleton(ComparisonTypeRepositoryInterface::class, ComparisonTypeRepository::class);
    }

}
