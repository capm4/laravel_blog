<?php

namespace App\Providers;

use App\EloquentORM\UserORM;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
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
        $this->app->bind('userorm', function ()
        {
            return new UserORM();
        });
    }
}
