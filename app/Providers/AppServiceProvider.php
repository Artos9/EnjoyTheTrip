<?php

namespace App\Providers;

use App\EnjoyTheTrip\Repositories\FrontendRepository;
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
        $this->app->bind(\App\EnjoyTheTrip\Interfaces\FrontendRepositoryInterface::class, function(){
            return new \App\EnjoyTheTrip\Repositories\FrontendRepository;
        });
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
