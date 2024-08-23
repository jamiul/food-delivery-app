<?php

namespace App\Providers;

use App\Interfaces\RiderLocationRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\RiderLocationRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RiderLocationRepositoryInterface::class, RiderLocationRepository::class);
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
