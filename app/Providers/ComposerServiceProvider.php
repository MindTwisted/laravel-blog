<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use App\Repositories\CategoryRepository;


class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Automatically load tags and categories to postsFilterPanel component
        View::composer('home.components.postsFilterPanel.postsFilterPanel', function ($view) {
            $view->with('tags', (new TagRepository())->all()->get())
                ->with('categories', (new CategoryRepository())->all()->get());
        });

        // Automatically load posts to commentsFilterPanel component
        View::composer('home.components.commentsFilterPanel.commentsFilterPanel', function ($view) {
            $view->with('posts', (new PostRepository())->all()->get());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}