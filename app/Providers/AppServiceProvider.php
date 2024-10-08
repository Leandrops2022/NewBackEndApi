<?php

namespace App\Providers;

use App\Contracts\Repositories\ActorRepositoryInterface;
use App\Contracts\Repositories\ArticleRepositoryInterface;
use App\Contracts\Repositories\MovieRepositoryInterface;
use App\Contracts\Repositories\SiteRepositoryInterface;
use App\Contracts\Repositories\TinyListRepositoryInterface;
use App\Contracts\Repositories\Top100RepositoryInterface;
use App\Contracts\Services\ActorServiceInterface;
use App\Contracts\Services\ArticleServiceInterface;
use App\Contracts\Services\AuthServiceInterface;
use App\Contracts\Services\HandleErrorServiceInterface;
use App\Contracts\Services\MovieServiceInterface;
use App\Contracts\Services\SiteServiceInterface;
use App\Contracts\Services\TinyListServiceInterface;
use APP\Contracts\Services\TmdbServiceInterface;
use App\Contracts\Services\Top100ServiceInterface;
use App\Repositories\ActorRepository;
use App\Repositories\ArticleRepository;
use App\Repositories\MovieRepository;
use App\Repositories\SiteRepository;
use App\Repositories\TinyListRepository;
use App\Repositories\Top100Repository;
use App\Services\ActorService;
use App\Services\ArticleService;
use App\Services\AuthService;
use App\Services\HandleErrorService;
use App\Services\MovieService;
use App\Services\SiteService;
use App\Services\TinyListService;
use App\Services\TmdbService;
use App\Services\Top100Service;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SiteRepositoryInterface::class, SiteRepository::class);
        $this->app->bind(SiteServiceInterface::class, SiteService::class);

        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
        $this->app->bind(ArticleServiceInterface::class, ArticleService::class);

        $this->app->bind(TinyListRepositoryInterface::class, TinyListRepository::class);
        $this->app->bind(TinyListServiceInterface::class, TinyListService::class);

        $this->app->bind(MovieServiceInterface::class, MovieService::class);
        $this->app->bind(MovieRepositoryInterface::class, MovieRepository::class);

        $this->app->bind(HandleErrorServiceInterface::class, HandleErrorService::class);

        $this->app->bind(ActorRepositoryInterface::class, ActorRepository::class);

        $this->app->bind(AuthServiceInterface::class, AuthService::class);

        $this->app->bind(TmdbServiceInterface::class, TmdbService::class);

        $this->app->bind(Top100RepositoryInterface::class, Top100Repository::class);
        $this->app->bind(Top100ServiceInterface::class, Top100Service::class);

        $this->app->bind(ActorRepositoryInterface::class, ActorRepository::class);
        $this->app->bind(ActorServiceInterface::class, ActorService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
