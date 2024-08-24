<?php

namespace App\Providers;

use App\Interfaces\ArticleRepositoryInterface;
use App\Interfaces\MiniListRepositoryInterface;
use App\Interfaces\MovieRepositoryInterface;
use App\Http\Repositories\ArticleRepository;
use App\Http\Repositories\MiniListRepository;
use App\Http\Repositories\MovieRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
        $this->app->bind(MiniListRepositoryInterface::class, MiniListRepository::class);
        $this->app->bind(MovieRepositoryInterface::class, MovieRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
