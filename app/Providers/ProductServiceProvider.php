<?php


namespace App\Providers;


use App\Contract\Repository\ProductRepositoryInterface;
use App\Infrastructure\DatabaseRepository\ProductRepository;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
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
        $this->app->singleton(ProductRepositoryInterface::class, ProductRepository::class);
    }

}
