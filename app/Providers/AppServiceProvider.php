<?php

namespace App\Providers;

use App\Repositories\BlogRepository;
use App\Repositories\PostsRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PostsRepository::class, function ($app) {
            return new PostsRepository();
        });
        $this->app->bind(BlogRepository::class, function ($app) {
            return new BlogRepository();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
