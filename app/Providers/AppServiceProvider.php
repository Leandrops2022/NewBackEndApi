<?php

namespace App\Providers;

use App\Contracts\Repositories\ArticleRepositoryInterface;
use App\Contracts\Repositories\MiniListRepositoryInterface;
use App\Contracts\Repositories\MovieRepositoryInterface;
use App\Contracts\Services\ArticleServiceInterface;
use App\Contracts\Services\HandleErrorServiceInterface;
use App\Contracts\Services\MiniListServiceInterface;
use App\Repositories\ArticleRepository;
use App\Repositories\MiniListRepository;
use App\Repositories\MovieRepository;
use App\Services\ArticleService;
use App\Services\HandleErrorService;
use App\Services\MiniListService;
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
        $this->app->bind(ArticleServiceInterface::class, ArticleService::class);
        $this->app->bind(MiniListServiceInterface::class, MiniListService::class);
        $this->app->bind(HandleErrorServiceInterface::class, HandleErrorService::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
