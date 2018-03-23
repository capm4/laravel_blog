<?php

namespace App\Providers;

use App\EloquentORM\CommentORM;
use Illuminate\Support\ServiceProvider;

class CommentServiceProvider extends ServiceProvider
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
        $this->app->bind('commentorm', function()
        {
           return new CommentORM();
        });
    }
}
