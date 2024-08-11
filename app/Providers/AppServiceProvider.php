<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Post;


use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('posts.index', function ($view) {
        $view->with('recentPosts', Post::latest()->take(5)->get());
    });
    }
}
