<?php

namespace App\Providers;

use App\Contracts\ActorRepositoryInterface;
use App\Contracts\Repositories\ArticleRepositoryInterface;
use App\Contracts\Repositories\MovieRepositoryInterface;
use App\Contracts\Repositories\TinyListRepositoryInterface;
use App\Contracts\Services\ArticleServiceInterface;
use App\Contracts\Services\HandleErrorServiceInterface;
use App\Contracts\Services\TinyListServiceInterface;
use App\Repositories\ActorRepository;
use App\Repositories\ArticleRepository;
use App\Repositories\MovieRepository;
use App\Repositories\TinyListRepository;
use App\Services\ArticleService;
use App\Services\HandleErrorService;
use App\Services\TinyListService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
        $this->app->bind(TinyListRepositoryInterface::class, TinyListRepository::class);
        $this->app->bind(MovieRepositoryInterface::class, MovieRepository::class);
        $this->app->bind(ArticleServiceInterface::class, ArticleService::class);
        $this->app->bind(TinyListServiceInterface::class, TinyListService::class);
        $this->app->bind(HandleErrorServiceInterface::class, HandleErrorService::class);
        $this->app->bind(ActorRepositoryInterface::class, ActorRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
