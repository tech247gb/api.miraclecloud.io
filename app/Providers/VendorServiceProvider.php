<?php


namespace App\Providers;


use App\Contract\Repository\VendorRepositoryInterface;
use App\Infrastructure\DatabaseRepository\VendorRepository;
use Illuminate\Support\ServiceProvider;

class VendorServiceProvider extends ServiceProvider
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
        $this->app->singleton(VendorRepositoryInterface::class, VendorRepository::class);
    }

}
