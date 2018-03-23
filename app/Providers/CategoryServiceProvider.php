<?php

namespace App\Providers;

use App\EloquentORM\CategoryORM;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('categoryorm', function ()
        {
           return new CategoryORM();
        });
    }
}
