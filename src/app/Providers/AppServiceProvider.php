<?php

namespace App\Providers;

use App\Services\Sample\AdminSampleService;
use App\Services\Sample\AdminSampleServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AdminSampleServiceInterface::class, AdminSampleService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
