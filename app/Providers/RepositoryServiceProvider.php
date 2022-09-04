<?php

namespace App\Providers;

use App\Repositories\BuildingRepositoryInterface;
use App\Repositories\Eloquent\BuildingRepository;
use App\Repositories\EloquentRepositoryInterface;
use BaseRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(BuildingRepositoryInterface::class, BuildingRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
