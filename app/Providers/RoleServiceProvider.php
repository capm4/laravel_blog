<?php

namespace App\Providers;

use App\EloquentORM\RoleORM;
use App\Role;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
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
        $this->app->bind('roleorm', function ()
        {
            return new RoleORM();
        });
    }
}
