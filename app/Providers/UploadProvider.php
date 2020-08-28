<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UploadImage;

class UploadProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UploadImage::class, function ($app) {
            return new UploadImage();
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
