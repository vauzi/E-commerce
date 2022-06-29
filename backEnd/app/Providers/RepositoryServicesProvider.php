<?php

namespace App\Providers;

use App\Repositories\Eloquent\UserAddressRepository;
use App\Repositories\UserAddressRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserAddressRepositoryInterface::class, UserAddressRepository::class);
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
