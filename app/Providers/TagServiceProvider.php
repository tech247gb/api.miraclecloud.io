<?php


namespace App\Providers;


use App\Contract\Repository\TagRepositoryInterface;
use App\Infrastructure\DatabaseRepository\TagRepository;
use Illuminate\Support\ServiceProvider;

class TagServiceProvider extends ServiceProvider
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
        $this->app->singleton(TagRepositoryInterface::class, TagRepository::class);
    }

}
