<?php

namespace App\Providers;

use App\EloquentORM\PostORM;
use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
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
        $this->app->bind('postorm',function(){
           return new PostORM();
        });
    }
}
