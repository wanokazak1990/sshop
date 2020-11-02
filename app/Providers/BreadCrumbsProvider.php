<?php

namespace App\Providers;
use App\Services\BreadCrumbs\BreadCrumbs;
use Illuminate\Support\ServiceProvider;

class BreadCrumbsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BreadCrumbs::class, function ($app) {
           return new BreadCrumbs();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
